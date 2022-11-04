<?php
/**
 * Title: fulfillment
 * Author: Menoud Yann
 * Version: 1.0 from 04.11.2022
 */

/**
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    $bag['data']['exercise'] = Exercise::getAnExercise($bag['id']);
    $bag['questions'] = Question::getAll($bag['id']);
    $bag['view'] = 'views/exercises/fulfillment';
    return $bag;
}

