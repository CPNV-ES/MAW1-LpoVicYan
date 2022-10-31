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

    public static function getAll( $exercise_id )
    {
        // returns an array with all the questions
        $questionsAsObjects = [];
        $pdo                = getConnector();
        $query              = 'SELECT * FROM questions WHERE exercise_id=?';
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
}