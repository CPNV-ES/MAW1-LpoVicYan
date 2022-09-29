<?php
/**
 * Title: question
 * Author: Luís Pedro Pinheiro
 * Version: 1.0 from 29th September 2022
 */

require_once ".const.php";

class Question
{
    protected $id;
    protected $name;
    protected $type;
    protected $order;
    protected $exercise_id;

    public function __construct( $id, $name, $type, $order, $exercise_id )
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->type        = $type;
        $this->order       = $order;
        $this->exercise_id = $exercise_id;
    }

    public static function loadById( $id )
    {
        // loads a question from database using id
        $res      = getConnector();
        $question = $res->query( "Select * from questions Where id = ?", $id )->fetchArray();
        $question = new Question( $question['id'], $question['name'], $question['type'], $question['order'], $question['exercise_id'] );
        unset( $res );
        return $question;
    }

    public static function getAll()
    {
        // returns an array with all the questions
        $res            = getConnector();
        $questions_list = $res->query( "Select * from questions" )->fetchAll();
        unset( $res );
        return $questions_list;
    }
}
