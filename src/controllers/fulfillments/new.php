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
    
    $answer = new Answer(0, date("Y-m-d H:i:s"), $bag['answer'], $bag['question_id']);


    $bag['view'] = 'views/fulfillments/index';
}