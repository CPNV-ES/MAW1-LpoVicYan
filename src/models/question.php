<?php

/**
 * Title: question
 * Author: Luís Pedro Pinheiro
 * Version: 1.0 from 29th September 2022
 */

require_once '.const.php';

class Question
{
    protected $id;

    protected $name;

    protected $order;

    protected $question_id;

    protected $type;

    public function __construct( $id, $name, $type, $order, $question_id )
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->type        = $type;
        $this->order       = $order;
        $this->exercise_id = $question_id;
    }

    public static function getAll( $exercise_id )
    {
        // returns an array with all the questions
        $questionsAsObjects = [];
        $pdo                = getConnector();
        $query              = 'SELECT * FROM questions WHERE exercise_id=?';
        $stmt               = $pdo->prepare( $query );
        $stmt->execute();
        $questions = $stmt->fetchAll( $exercise_id );

        foreach ( $questions as $question )
        {
            $questionsAsObject = new Question( $question['id'], $question['title'], $question['creation_date'], $question['modification_date'], $question['status'] );
            array_push( $questionsAsObjects, $questionsAsObject );
        }

        return $questionsAsObjects;
    }
}