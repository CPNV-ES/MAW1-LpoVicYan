<?php

/**
 * Title: index
 * Author: Luís Pedro Pinheiro
 * Version: 3.0 from 16 September 2022
 */

/**
 * Import exercise model
 */
require_once SOURCE_DIR . '/models/Exercise.php';


/**
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    $bag['data'] = ['exercises' => Exercise::getAllExercises()];
    $bag['view'] = 'views/exercises/index';
    return $bag;
}


