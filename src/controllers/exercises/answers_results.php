<?php

/**
 * Project MAW-LPOVicYAn
 * Title : statistics_results
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.11.2022
 */

$exercise = Exercise::getAnExercise($bag['exercise_id']); //sélectionne l'exercice
$question = Question::getById($bag['answer_id']); // sélectionnes les question de l'exercice
$fulfillments = Fulfillment::getAllFulfillmentsByExerciseId($exercise->getId()); //sélectionne la date du fullfillment 
$answers = [];

foreach ($fulfillments as $fulfillment) {
    $listOfAnswers = Answer::getAllByFulfillment($fulfillment->getId());
    foreach ($listOfAnswers as $answer) {
        if ($answer->getQuestionId() == $bag['answer_id']) {
            array_push($answers, $answer);
        }
    }
}

if ($bag['handler']) {
    $bag['data'] = ['exercise' => $exercise, 'question' => $question, 'fulfillments' => $fulfillments, 'answers' => $answers];
    $bag['view'] = 'views/questions/results';
    return $bag;
}
