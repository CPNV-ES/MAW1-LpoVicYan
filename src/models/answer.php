<?php
/**
 * Title: answer
 * Author: Luís Pedro Pinheiro
 * Version: 1.0 from 16th September 2022
 */

class Answer
{
    protected $answer_id;
    protected $creation_date;
    protected $answer_text;
    protected $question_id;

    public function __construct( $id, $date, $answer, $question_id )
    {
        $this->answer_id     = $id;
        $this->creation_date = $date;
        $this->answer_text   = $answer;
        $this->question_id   = $question_id;
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
        // Updates or creates a answer depending if it exists or not
        $res    = getConnector();
        $answer = array( 'date' => $this->date, 'answer' => $this->answer, 'question_id' => $this->question_id );

        if ( $this->id === 0 )
        {
            $query_result = $res->insert( 'answers', $answer );
            $query_result = $res->lastInsertID();
            $answer       = Answer::loadById( $query_result );
            unset( $query_result );
            return $answer;
        }
        else
        {
            $query_result = $res->update( 'answers', $answer, 'WHERE id = ' . $this->id );
        }

    }

    public function delete()
    {
        $res  = getConnector();
        $data = ['name' => 'id', 'value' => $this->id];
        $res->delete( "answers", $data );
        unset( $res );
    }

    public static function loadById( $id )
    {
        // loads a answer from database using id
        $res    = getConnector();
        $answer = $res->query( "Select * from answers Where id = ?", $id )->fetchArray();
        $answer = new Answer( $answer['date'], $answer['answer'], $answer['question_id'], $answer['id'] );
        unset( $res );
        return $answer;
    }

    public static function getAll()
    {
        // returns an array with all the questions
        $res          = getConnector();
        $answers_list = $res->query( "Select * from answers" )->fetchAll();
        unset( $res );
        return $answers_list;
    }

    public static function deleteById( $id )
    {
        $res  = getConnector();
        $data = ['name' => 'id', 'value' => $id];
        $res->delete( "answers", $data );
        unset( $res );
    }

}
