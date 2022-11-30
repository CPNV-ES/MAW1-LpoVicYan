<?php

/**
 * Title: New
 * Author: Yann Menoud
 * Version: 1.0 from 16.11.2022
 */


/**
 * If $bag['handler] is receive
 */
if ( $bag['handler'] )
{
    var_dump($bag['fulfillments']);

    foreach ($bag['fulfillments']['answers_attributes'] as $fulfillment)
    {
        $answer = new Answer(0 ,date("Y-m-d H:i:s"), $fulfillment['value'], $fulfillment['question_id']);
        $answer->save();
    }
    header( 'Location: /exercises/' . $bag['exercise_id'] . '/fulfillments/' . $answer->getId() . '/edit' );
}