<?php

/**
 * Title: New
 * Author: Yann Menoud
 * Version: 1.0 from 02.12.2022
 */


/**
 * If $bag['handler] is receive
 */
if ( $bag['handler'] )
{
    if ( $bag['fulfillments'] )
    {
        //
    }

    $exercise_id = $bag['exercise_id'];
    $fulfillment_id = $bag['fulfillment_id'];

    $exercise_id = $bag['exercise_id'];
    $bag['data'] = ['questions' => Question::getAll($exercise_id), 'exercise' => Exercise::getAnExercise($exercise_id), 'answers' => Answer::getAllByFulfillment($fulfillment_id)];
    $bag['view'] = 'views/fulfillments/edit';
    return $bag;
    
}

