<?php

/**
 * Title: Index
 * Author: Yann Menoud
 * Version: 1.0 from 16.11.2022
 */


/**
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    $id = $bag['id'];
    $bag['data']['questions'] = Question::getAll($id);
    $bag['data']['exercise_name'] = Exercise::getAnExercise($id)->getTitle();
    $bag['view'] = 'views/fulfillments/index';
    return $bag;
}