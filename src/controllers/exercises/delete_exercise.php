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
    Exercise::delete($bag['id']);
    header('Location: /manage-exercises');
    $bag['view'] = 'views/exercises/index';
    return $bag;
}
