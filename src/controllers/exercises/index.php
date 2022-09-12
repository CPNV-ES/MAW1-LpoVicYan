<?php

/**
 * Title: index
 * Author: Luís Pedro Pinheiro
 * Version: 1.0 from 29th August 2022
 */

/**
 * Import exercises controller
 */
require_once SOURCE_DIR . '/models/exercises/index.php';


/**
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    $bag['data'] = ['exercises' => getAllExercises()];
    $bag['view'] = 'views/exercises/index';
    return $bag;
}


