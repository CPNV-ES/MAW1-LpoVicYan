<?php

class Answer
{
    protected $id;
    protected $date;
    protected $answer_text;
    protected $question_id;

    public function __construct($id, $date, $answer, $question_id)
    {
        $this->id = $id;
        $this->date = $date;
        $this->answer_text = $answer;
        $this->question_id = $question_id;
    }

    public function __get($property)
    {

        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {

        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }

    public function save()
    {
        // Updates or creates a answer depending if it exists or not
        $pdo = getConnector();
        $query = 'SELECT * FROM exercises WHERE id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->id]);

        if ( $stmt->fetch() == null ) {
            $query = 'INSERT INTO answer (id, date, answer, question_id) VALUES (?, ?, ?, ?)';
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->id, date("Y-m-d H:i:s"), $this->answer_text, $this->question_id]);
            return $pdo->lastInsertId();
        } else {
            $query = 'UPDATE answer SET date=?, answer=? WHERE id=?';
            $stmt = $pdo->prepare($query);
            $stmt->execute([date("Y-m-d H:i:s"), $this->answer_text, $this->id]);
        }
    }

    public function delete()
    {
        $pdo = getConnector();
        $query = 'DELETE FROM answer WHERE id=?';
        $stmt = $pdo->prepare( $query );
        $stmt->execute( [$this->id] );
    }

    public static function loadById($id)
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM answer WHERE id = ?';
        $stmt = $pdo->prepare( $query );
        $stmt->execute( [$id] );
        $answer = $stmt->fetch();
        $answerAsObject = new Answer( $answer['id'], $answer['date'], $answer['answer_text'], $answer['question_id']);

        return $answerAsObject;
    }

    public static function getAll()
    {
        $answersAsObjects = [];
        $pdo = getConnector();
        $query = 'SELECT * FROM answer;';
        $stmt = $pdo->prepare( $query );
        $stmt->execute();
        $answers = $stmt->fetchAll();

        foreach ( $answers as $answer )
        {
            $answerAsObject = new Answer($answer['id'], $answer['date'], $answer['answer_text'], $answer['question_id']);
            array_push( $answersAsObjects, $answerAsObject);
        }

        return $answersAsObjects;
    }

    public static function deleteById($id)
    {
        $pdo = getConnector();
        $query = 'DELETE FROM answer WHERE id=?';
        $stmt = $pdo->prepare( $query );
        $stmt->execute( [$id] );
    }

}
