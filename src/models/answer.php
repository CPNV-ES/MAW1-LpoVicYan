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

    public function save()
    {
        // Updates or creates a answer depending if it exists or not
        $pdo = getConnector();
        $query = 'SELECT * FROM exercises WHERE id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->id]);

        if ($stmt->fetch() == null) {
            $query = 'INSERT INTO answers (id, date, answer, question_id) VALUES (?, ?, ?, ?)';
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->id, date("Y-m-d H:i:s"), $this->answer_text, $this->question_id]);
            return $pdo->lastInsertId();
        } else {
            $query = 'UPDATE answers SET date=?, answer=? WHERE id=?';
            $stmt = $pdo->prepare($query);
            $stmt->execute([date("Y-m-d H:i:s"), $this->answer_text, $this->id]);
        }
    }

    public function delete()
    {
        $pdo = getConnector();
        $query = 'DELETE FROM answers WHERE id=?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->id]);
    }

    public static function loadById($id)
    {
        $pdo = getConnector();
        $query = 'SELECT * FROM answers WHERE id = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $answer = $stmt->fetch();
        $answerAsObject = new Answer($answer['id'], $answer['date'], $answer['answer_text'], $answer['question_id']);

        return $answerAsObject;
    }

    public static function getAllById($id)
    {
        $pdo = getConnector();
        $answersAsObjects = [];
        $query = 'SELECT * FROM answers WHERE id = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $answers = $stmt->fetchAll();

        foreach ($answers as $answer) {
            $answerAsObject = new Answer($answer['id'], $answer['date'], $answer['answer_text'], $answer['question_id']);
            array_push($answersAsObjects, $answerAsObject);
        }
        return $answersAsObjects;
    }

    public static function getAll()
    {
        $answersAsObjects = [];
        $pdo = getConnector();
        $query = 'SELECT * FROM answers;';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $answers = $stmt->fetchAll();

        foreach ($answers as $answer) {
            $answerAsObject = new Answer($answer['id'], $answer['date'], $answer['answer'], $answer['question_id']);
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
}
