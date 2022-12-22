<?php

/*
 * Title: question
 * Author: LPOdev
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
    protected $answers;

    public function __construct($id, $name, $type, $order, $exercise_id, $answers)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->order = $order;
        $this->exercise_id = $exercise_id;
        $this->answers = $answers;
    }

    /**
     * Delete an exercise by id
     */
    public function delete()
    {
        $pdo = getConnector();
        $query = 'DELETE FROM questions WHERE id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->id]);
    }


    public static function getAll($exercise_id)
    {
        // returns an array with all the questions
        $questionsAsObjects = [];
        $pdo = getConnector();
        $query = 'SELECT * FROM questions WHERE exercise_id=? ORDER BY `order`';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$exercise_id]);
        $questions = $stmt->fetchAll();

        foreach ($questions as $question) {
            $answers = Answer::getAllByQuestion($question['id']);
            $questionsAsObject = new Question($question['id'], $question['name'], $question['type'], $question['order'], $question['exercise_id'], $answers);
            array_push($questionsAsObjects, $questionsAsObject);
        }
        return $questionsAsObjects;
    }

    public static function getById($id)
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM questions WHERE id = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $question = $stmt->fetchAll()[0];
        $answers = Answer::getAllByQuestion($id);
        return new Question($question['id'], $question['name'], $question['type'], $question['order'], $question['exercise_id'], $answers);
    }

    public static function getAllById($id)
    {
        $pdo   = getConnector();
        $questionsAsObjects = [];
        $query = 'SELECT * FROM questions WHERE id = ?';
        $stmt  = $pdo->prepare($query);
        $stmt->execute([$id]);
        $questions = $stmt->fetchAll();

        foreach ($questions as $question) {
            $questionAsObject = new Question($question['id'], $question['name'], $question['type'], $question['order'], $question['exercise_id'], null);
            array_push($questionsAsObjects, $questionAsObject);
        }
        return $questionsAsObjects;
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

    public function getAnswers()
    {
        return $this->answers;
    }

    public function save()
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM questions WHERE id = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->id]);

        if ($stmt->fetch() == null) {
            $query = 'INSERT INTO questions (`name`, `type`, `order`, `exercise_id`) VALUES (?, ?, ?, ?)';
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->name, $this->type, $this->order, $this->exercise_id]);
        } else {
            $query = 'UPDATE questions SET name=?, type=? WHERE id=?';
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->name, $this->type, $this->id]);
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
