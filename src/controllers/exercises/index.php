<?php

/*
 * Title: index
 * Author: LPOdev
 * Version: 3.0 from 16 September 2022
 */

/*
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    $bag['data'] = [];
    $bag['data']['exercisesBuilding'] = Exercise::getAllExercises("building");
    $bag['data']['exercisesAnswering'] = Exercise::getAllExercises("answering");
    $bag['data']['exercisesClosed'] = Exercise::getAllExercises("closed");
    $bag['view'] = 'views/exercises/index';
    return $bag;
}