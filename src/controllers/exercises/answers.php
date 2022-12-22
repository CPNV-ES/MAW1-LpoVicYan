<?php

/**
 * Project MAW-LPOVicYAn
 * Title : answers
 * Author : Victorien Montavon & Yann Menoud
 * Vs : 3.0 from 16.12.2022
 */
if ($bag['handler']) {
    $exercise_id = $bag['exercise_id'];
    $fulfillment = $bag['fulfillment_id'];
    $questions = [];


    if ($exercise_id) {

        $exercise = Exercise::getAnExercise($exercise_id);
        $questions = Question::getAll($exercise_id);
    }
    $bag['data'] = ['exercise' => $exercise, 'fulfillment_id' => $fulfillment, 'questions_exercise' => $questions];
}
$bag['view'] = 'views/exercises/answers';
