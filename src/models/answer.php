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

    public function __constructor($id, $date, $answer, $question_id)
    {
        $this->answer_id = $id;
        $this->creation_date = $date;
        $this->answer_text = $answer;
        $this->question_id = $question_id;
    }
}
