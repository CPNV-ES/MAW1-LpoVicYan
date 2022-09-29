<?php
/**
 * Title: question
 * Author: Luís Pedro Pinheiro
 * Version: 1.0 from 29th September 2022
 */

class Question
{
    protected $id;
    protected $name;
    protected $type;
    protected $order;
    protected $exercise_id;

    public function __constructor($id, $name, $type, $order, $exercise_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->order = $order;
        $this->exercise_id = $exercise_id;
    }

    public static function loadById($id)
    {
        // loads a question from database using id
    }

    public static function getAll()
    {
        // returns an array with all the questions
    }
}
