<?php

/**
 * Title: exercise.php
 * Author: Menoud Yann
 * Version: 3.0 from 16th September 2022
 */

define('USERS_DATA_PATHNAME', BASE_DIR . '/data/exercises.json');

/**
 * Contructor of Exercise
 */
class Exercise
{
    protected $creation_date;

    protected $id;

    protected $modification_date;

    protected $status;

    protected $title;

    /**
     * Constructor of Exercise
     */
    public function __construct(
        $id,
        $title,
        $creation_date,
        $modification_date,
        $status
    ) {
        $this->id                = $id;
        $this->title             = $title;
        $this->creation_date     = $creation_date;
        $this->modification_date = $modification_date;
        $this->status            = $status;
    }

    /**
     * Delete an exercise
     */
    static function delete($id)
    {
        $pdo = getConnector();

        // check if current exercise has fields.
        $exercise_fields = Question::getAll( $id );

        // if true delete fields and anwers
        if ( !empty( $exercise_fields ) )
        {
            foreach ( $exercise_fields as $field )
            {
                $answers = Answer::getAllByQuestionId( $field->getId() );
                if ( !empty( $exercise_fields ) )
                {
                    foreach ( $answers as $answer )
                    {
                        $answer->delete();
                    }
                }

                $field->delete();
            }
        }

        $query = 'DELETE FROM exercises WHERE id=?';
        $stmt  = $pdo->prepare($query);
        $stmt->execute([$id]);
    }

    /**
     * Delete an exercise
     */
    function destroy()
    {
        $pdo = getConnector();

        // check if current exercise has fields.
        $exercise_fields = Question::getAll( $this->id );

        // if true
        if ( !empty( $exercise_fields ) )
        {
            foreach ( $exercise_fields as $field )
            {
                $answers = Answer::getAllByQuestionId( $field->getId() );

                foreach ( $answers as $answer )
                {
                    $answer->delete();
                }
                $field->delete();
            }
        }

        $query = 'DELETE FROM exercises WHERE id=?';
        $stmt  = $pdo->prepare($query);
        $stmt->execute([$this->id]);
    }

    /**
     * Get all exercises of a status
     */
    static function getAllExercises($status)
    {
        $exercisesAsObjects = [];
        $pdo                = getConnector();
        $query              = 'SELECT * FROM exercises WHERE status=?';
        $stmt               = $pdo->prepare($query);
        $stmt->execute([$status]);
        $exercises = $stmt->fetchAll();

        foreach ($exercises as $exercise) {
            $exerciseAsObject = new Exercise($exercise['id'], $exercise['title'], $exercise['creation_date'], $exercise['modification_date'], $exercise['status']);
            array_push($exercisesAsObjects, $exerciseAsObject);
        }

        return $exercisesAsObjects;
    }

    /**
     * Get an exercise
     */
    static function getAnExercise($id)
    {
        $pdo   = getConnector();
        $query = 'SELECT * FROM exercises WHERE id = ?';
        $stmt  = $pdo->prepare($query);
        $stmt->execute([$id]);
        $exercise         = $stmt->fetch();
        $exerciseAsObject = new Exercise($exercise['id'], $exercise['title'], $exercise['creation_date'], $exercise['modification_date'], $exercise['status']);

        return $exerciseAsObject;
    }

    /**
     * Get creation date
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Get id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get last modification date
     */
    public function getModificationDate()
    {
        return $this->modification_date;
    }

    /**
     * Get status of exercise
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Create an exercise
     */
    function save()
    {
        $pdo   = getConnector();
        $query = 'SELECT * FROM exercises WHERE id = ?';
        $stmt  = $pdo->prepare($query);
        $stmt->execute([$this->id]);

        if ($stmt->fetch() == null) {
            $query = 'INSERT INTO exercises (id, title, creation_date, modification_date, status) VALUES (?, ?, ?, ?, ?)';
            $stmt  = $pdo->prepare($query);
            $stmt->execute([$this->id, $this->title, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $this->status]);

            return $pdo->lastInsertId();
        } else {
            $query = 'UPDATE exercises SET title=?, creation_date=?, modification_date=?, status=? WHERE id=?';
            $stmt  = $pdo->prepare($query);
            $stmt->execute([$this->title, $this->creation_date, date("Y-m-d H:i:s"), $this->status, $this->id]);
        }
    }

    /**
     * Set modification date of exercise
     */
    public function setModificationDate($newModificationDAte)
    {
        $this->modification_date = $newModificationDAte;
    }

    /**
     * Set status of exercise
     */
    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    /**
     * Set Title of exercise
     */
    public function setTitle($newTitle)
    {
        $this->title = $newTitle;
    }
}
