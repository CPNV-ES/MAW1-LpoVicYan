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
    $exercise_id = $bag['exercise_id'];
    $bag['data'] = ['exercise_id' => $exercise_id, 'questions' => Question::getAll($exercise_id), 'exercise_name' => Exercise::getAnExercise($exercise_id)->getTitle()];
    $bag['view'] = 'views/fulfillments/index';
    return $bag;
}
