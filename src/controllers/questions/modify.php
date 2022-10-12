<?php
/**
 * Project: MAW1-LpoVicYan
 * Title: modify.php
 * Author: LPOdev
 * Version: 1.0 from the 07th 10 2022
 */

require_once SOURCE_DIR . '/models/question.php';

if ( $bag[ 'handler' ] )
{
    $bag[ 'data' ] = [];
    $bag[ 'data' ] = [ "exercise_id" => $bag['exercise_id'], 'question' => Question::loadById( $bag[ 'question_id' ] ) ];
    $bag[ 'view' ] = 'views/questions/modify_form';
    return $bag;
}