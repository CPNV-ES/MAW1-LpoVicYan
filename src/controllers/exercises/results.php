<?php
/**
 * Project MAW-LPOVicYAn
 * Title : statistics_results
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.11.2022
 */

$exercise = Exercise::getAnExercise( $bag['id']);
$question = Question::getAllById( $bag['id']);

//$answers = Answer::getAllById($question->id);

$bag ['data'] = ['title' => $exercise->getTitle()];
//$bag ['data'] = ['answers' => Answer::getAll( $bag['date'] ) ];
//$bag ['data'] = ['answers' => Answer::getAll( $bag['date'] ) ];
$bag ['view'] = 'views/exercises/results';

return $bag;