<?php

class Answer
{
    protected $answer_text;

    protected $date;

    protected $id;

    protected $question_id;
    protected $fulfillment_id;

    public function __construct($id, $date, $answer, $question_id, $fulfillment_id)
    {
        $this->id          = $id;
        $this->date        = $date;
        $this->answer_text = $answer;
        $this->question_id = $question_id;
        $this->fulfillment_id = $fulfillment_id;
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
        $answersAsObjects = [];
        $pdo              = getConnector();
        $query            = 'SELECT * FROM answers;';
        $stmt             = $pdo->prepare( $query );
        $stmt->execute();
        $answers = $stmt->fetchAll();

        foreach ( $answers as $answer )
        {
            $answerAsObject = new Answer( $answer['id'], $answer['date'], $answer['answer_text'], $answer['question_id'] );
            array_push( $answersAsObjects, $answerAsObject );
        }
        return $answersAsObjects;
    }

    public static function getAllByQuestionId( $question_id )
    {
        // Updates or creates a answer depending if it exists or not
        $pdo = getConnector();
        $query = 'SELECT * FROM answers WHERE id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->id]);

        if ($stmt->fetch() == null) {
            $query = 'INSERT INTO answers (modification_date, answer, question_id, fulfillment_id) VALUES (?, ?, ?, ?)';
            $stmt = $pdo->prepare($query);
            $stmt->execute([date("Y-m-d H:i:s"), $this->answer_text, $this->question_id, $this->fulfillment_id]);
            return $pdo->lastInsertId();
        } else {
            $query = 'UPDATE answers SET modification_date=?, answer=? WHERE id=?';
            $stmt = $pdo->prepare($query);
            $stmt->execute([date("Y-m-d H:i:s"), $this->answer_text, $this->id]);
        }

    public function delete()
    {
        $pdo = getConnector();
        $query = 'DELETE FROM answers WHERE id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->id]);
    }

    public static function loadById( $id )
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM answers WHERE id = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $answer = $stmt->fetch();
        $answerAsObject = new Answer($answer['id'], $answer['modification_date'], $answer['answer_text'], $answer['question_id'], $answer['fulfillment_id']);
        return $answerAsObject;
    }

    public static function getAll($question_id)
    {
        $answersAsObjects = [];
        $pdo = getConnector();
        $query = 'SELECT * FROM answers where question_id = ?;';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$question_id]);
        $answers = $stmt->fetchAll();

        foreach ($answers as $answer) {
            $answerAsObject = new Answer($answer['id'], $answer['modification_date'], $answer['answer_text'], $answer['question_id'], $answer['fulfillment_id']);
            array_push($answersAsObjects, $answerAsObject);
        }
        return $answersAsObjects;
    }

    public static function getAllByFulfillment($fulfillment_id)
    {
        $answersAsObjects = [];
        $pdo = getConnector();
        $query = 'SELECT * FROM answers where fulfillment_id = ?;';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$fulfillment_id]);
        $answers = $stmt->fetchAll();

        foreach ($answers as $answer) {
            $answerAsObject = new Answer($answer['id'], $answer['modification_date'], $answer['answer'], $answer['question_id'], $answer['fulfillment_id']);
            array_push($answersAsObjects, $answerAsObject);
        }
        return $answersAsObjects;
    }  

    public static function deleteById($id)
    {
        $pdo = getConnector();
        $query = 'DELETE FROM answers WHERE id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getQuestionId()
    {
        return $this->question_id;
    }

    public function getAnswerText()
    {
        return $this->answer_text;
    }
}

