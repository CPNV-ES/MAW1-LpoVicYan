<?php

/**
 * Title: create_exercise
 * Author: Menoud Yann
 * Version: 1.0 from 07.10.2022
 */


/**
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    Exercise::deleteAnExercise($bag['id']);
    $bag['data']['exercisesBuilding'] = Exercise::getAllExercises("building");
    $bag['data']['exercisesAnswering'] = Exercise::getAllExercises("answering");
    $bag['data']['exercisesClosed'] = Exercise::getAllExercises("closed");
    $bag['view'] = 'views/exercises/index';
    return $bag;
}
