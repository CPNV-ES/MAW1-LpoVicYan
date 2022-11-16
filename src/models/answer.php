<?php

class Answer
{
    protected $answer_text;

    protected $date;

    protected $id;

    protected $question_id;

    public function __construct( $id, $date, $answer, $question_id )
    {
        $this->id          = $id;
        $this->date        = $date;
        $this->answer_text = $answer;
        $this->question_id = $question_id;
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

    public function delete()
    {
        $pdo   = getConnector();
        $query = 'DELETE FROM answers WHERE id=?';
        $stmt  = $pdo->prepare( $query );
        $stmt->execute( [$this->id] );
    }

    public static function deleteById( $id )
    {
        $pdo   = getConnector();
        $query = 'DELETE FROM answers WHERE id=?';
        $stmt  = $pdo->prepare( $query );
        $stmt->execute( [$id] );
    }

    public static function getAll()
    {
        // returns an array with all the answers
        $res          = getConnector();
        $answers_list = $res->query( 'Select * from answers' )->fetchAll();
        unset( $res );

        return $answers_list;
    }

    public static function getAllByQuestionId( $question_id )
    {
        $answersAsObjects = [];
        $pdo              = getConnector();
        $query            = 'SELECT * FROM answers WHERE question_id=?';
        $stmt             = $pdo->prepare( $query );
        $stmt->execute( [$question_id] );
        $answers = $stmt->fetchAll();

        foreach ( $answers as $answer )
        {
            $answersAsObject = new Answer( $answer['id'], $answer['date'], $answer['answer'], $answer['question_id'] );
            array_push( $answersAsObjects, $answersAsObject );
        }

        return $answersAsObjects;
    }

    public static function loadById( $id )
    {
        // loads a answer from database using id
        $res    = getConnector();
        $answer = $res->query( 'Select * from answers Where id = ?', $id )->fetchArray();
        $answer = new Answer( $answer['date'], $answer['answer'], $answer['question_id'], $answer['id'] );
        unset( $res );

        return $answer;
    }

    public function save()
    {
        // Updates or creates a answer depending if it exists or not
        $res    = getConnector();
        $answer = ['date' => $this->date, 'answer' => $this->answer, 'question_id' => $this->question_id];

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
}