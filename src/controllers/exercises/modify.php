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
    $bag[ 'data' ] = [ 'questions' => Question::getQuestionsFromExercise( $bag[ 'exercise_id' ] ) ];
    $bag[ 'view' ] = 'views/exercises/modify_form';
    return $bag;
}