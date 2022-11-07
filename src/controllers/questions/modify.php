<?php
/**
 * Project: MAW1-LpoVicYan
 * Title: modify.php
 * Author: LPOdev
 * Version: 1.0 from the 31th October 2022
 */

if ( $bag['handler'] )
{
    $bag['data'] = [];
    $bag['data'] = ['exercise_id' => $bag['exercise_id'], 'question' => Question::getById( $bag['question_id'] )];
    $bag['view'] = 'views/questions/modify_form';

    return $bag;
}