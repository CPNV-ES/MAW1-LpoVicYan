<?php

/**
 * Title: question
 * Author: Luís Pedro Pinheiro
 * Version: 1.0 from 29th September 2022
 */

require_once '.const.php';

class Question
{
    protected $exercise_id;

    protected $id;

    protected $name;

    protected $order;

    protected $type;

    public function __construct( $id, $name, $type, $order, $exercise_id )
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->type        = $type;
        $this->order       = $order;
        $this->exercise_id = $exercise_id;
    }

    /**
     * Delete an exercise
     */
    function delete()
    {
        $pdo   = getConnector();
        $query = 'DELETE FROM questions WHERE id=?';
        $stmt  = $pdo->prepare( $query );
        $stmt->execute( [$this->id] );
    }

    static function destroy( $id )
    {
        $pdo   = getConnector();
        $query = 'DELETE FROM questions WHERE id=?';
        $stmt  = $pdo->prepare( $query );
        $stmt->execute( [$id] );
    }

    public static function getAll( $exercise_id )
    {
        // returns an array with all the questions
        $questionsAsObjects = [];
        $pdo                = getConnector();
        $query              = 'SELECT * FROM questions WHERE exercise_id=? ORDER BY `order`';
        $stmt               = $pdo->prepare( $query );
        $stmt->execute( [$exercise_id] );
        $questions = $stmt->fetchAll();

        foreach ( $questions as $question )
        {
            $questionsAsObject = new Question( $question['id'], $question['name'], $question['type'], $question['order'], $question['exercise_id'] );
            array_push( $questionsAsObjects, $questionsAsObject );
        }

        return $questionsAsObjects;
    }

    public static function getById( $id )
    {
        $pdo   = getConnector();
        $query = 'SELECT * FROM questions WHERE id = ?';
        $stmt  = $pdo->prepare( $query );
        $stmt->execute( [$id] );
        $question = $stmt->fetchAll()[0];

        return new Question( $question['id'], $question['name'], $question['type'], $question['order'], $question['exercise_id'] );
    }

    public function getExerciseId()
    {
        return $this->exercise_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function save()
    {
        $pdo   = getConnector();
        $query = 'SELECT * FROM questions WHERE id = ?';
        $stmt  = $pdo->prepare( $query );
        $stmt->execute( [$this->id] );

        if ( $stmt->fetch() == null )
        {
            $query = 'INSERT INTO questions (`name`, `type`, `order`, `exercise_id`) VALUES (?, ?, ?, ?)';
            $stmt  = $pdo->prepare( $query );
            $stmt->execute( [$this->name, $this->type, $this->order, $this->exercise_id] );
        }
        else
        {
            $query = 'UPDATE questions SET name=?, type=? WHERE id=?';
            $stmt  = $pdo->prepare( $query );
            $stmt->execute( [$this->name, $this->type, $this->id] );
        }
    }

    public function setName( $name )
    {
        $this->name = $name;
    }

    public function setType( $type )
    {
        $this->type = $type;
    }
}