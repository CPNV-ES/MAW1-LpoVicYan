<?php

/**
 * Project MAW-LPOVicYAn
 * Title : statistics_results
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.11.2022
 */

$exercise = Exercise::getAnExercise($bag['exercise_id']); //sélectionne l'exercice
$fulfillment = Fulfillment::getAFulfillment($bag['fulfillment']); //sélectionne le fullfillment 
$answer = Answer::getAll($bag['answers']); // sélectionne toutes les réponses


$bag['data'] = ['exercise' => $exercise, 'fulfillment' => $fulfillment, 'answer' => $fulfillment];
$bag['view'] = 'views/exercises/results';

return $bag;
