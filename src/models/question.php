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

    public function __construct( $name, $type, $order, $exercise_id, $id = 0 )
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->type        = $type;
        $this->order       = $order;
        $this->exercise_id = $exercise_id;
    }

    public function __get( $property )
    {

        if ( property_exists( $this, $property ) )
        {
            return $this->$property;
        }

    }

    public function __set( $property, $value )
    {

        if ( property_exists( $this, $property ) )
        {
            $this->$property = $value;
        }

        return $this;
    }

    public function save()
    {
        // Updates or creates a question depending if it exists or not
        $res      = getConnector();
        $question = array( 'name' => $this->name, 'type' => $this->type, 'order' => $this->order, 'exercise_id' => $this->exercise_id );

        if ( $this->id === 0 )
        {
            $query_result = $res->insert( 'questions', $question );
            $query_result = $res->lastInsertID();
            $question     = Question::loadById( $query_result );
            unset( $query_result );
            return $question;
        }
        else
        {
            $query_result = $res->update( 'questions', $question, 'WHERE id = ' . $this->id );
        }

    }

    public function delete()
    {
        $res  = getConnector();
        $data = ['name' => 'id', 'value' => $this->id];
        $res->delete( "questions", $data );
        unset( $res );
    }

    public static function loadById( $id )
    {
        // loads a question from database using id
        $res      = getConnector();
        $question = $res->query( "Select * from questions Where id = ?", $id )->fetchArray();
        $question = new Question( $question['name'], $question['type'], $question['order'], $question['exercise_id'], $question['id'] );
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

    public static function deleteById( $id )
    {
        $res  = getConnector();
        $data = ['name' => 'id', 'value' => $id];
        $res->delete( "questions", $data );
        unset( $res );
    }

    public static function getQuestionsFromExercise($exercise_id)
    {
        $res = getConnector();
        $questions_list = $res->query("Select * from questions WHERE exercise_id = ".$exercise_id)->fetchAll();
        unset($res);
        return $questions_list;
    }
    
}
