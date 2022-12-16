<?php

/**
 * Project MAW-LPOVicYAn
 * Title : statistics_answers
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.12.2022
 */


if ($bag['handler']) 
{
$exercise = Exercise::getAnExercise($bag['exercise_id']); //sélectionne l'exercice
$fulfillment = Fulfillment::getAFulfillmentByExercise($bag['fulfillment_id']); //sélectionne la date du fullfillment 
$answers = Answer::getAllByFulfillment($bag['fulfillment_id']); //sélectionne toutes les réponses de l'exercice
var_dump($bag['fulfillment_id']);
$bag['data'] = ['exercise' => $exercise, 'fulfillment' => $fulfillment, 'answers' => $answers];
$bag['view'] = 'views/exercises/answers';
return $bag;
}
