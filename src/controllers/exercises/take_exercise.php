<?php
/**
 * Title: take_exercise
 * Author: Menoud Yann
 * Version: 1.0 from 31.10.2022
 */

/**
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    $bag['data']['exercisesAnswering'] = Exercise::getAllExercises("answering");
    $bag['view'] = 'views/exercises/take_exercise';
    return $bag;
}


