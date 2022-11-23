<?php
/**
 * Project MAW-LPOVicYAn
 * Title : statistics_results
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.11.2022
 */


 $exercise = Exercise::getAnExercise( $bag['exercise_id']);

$bag ['data'] = ['exercise' => $exercise, 'questions' => Exercise::getAnExercise( $bag['exercise_id'] ) ];
$bag ['view'] = 'views/exercises/results';

return $bag;