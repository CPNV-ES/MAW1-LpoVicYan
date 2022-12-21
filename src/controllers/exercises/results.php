<?php

/**
 * Project MAW-LPOVicYAn
 * Title : statistics_results
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.11.2022
 */

$exercise = Exercise::getAnExercise($bag['exercise_id']); //sélectionne l'exercice
$questions = Question::getAll($exercise->getId()); // sélectionnes les question de l'exercice
$fulfillments = Fulfillment::getAFulfillmentsByExercise($exercise->getId()); //sélectionne la date du fullfillment 

if ($bag['handler']) 
{
$bag['data'] = ['exercise' => $exercise, 'questions' => $questions, 'fulfillments' => $fulfillments, 'answers' => $answers];

$bag['view'] = 'views/exercises/results';
return $bag;
}
