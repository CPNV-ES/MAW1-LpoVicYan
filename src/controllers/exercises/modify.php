<?php
/**
 * Project: MAW1-LpoVicYan
 * Title: modify.php
 * Author: LPOdev ++ copy VicMtn
 * Version: 1.0 from the 07th 10 2022
 */

require_once SOURCE_DIR . '/models/question.php';

if ( $bag['post_data'] )
{
    $data = $bag['post_data'];
    $question = Question::loadById($data['id']);
    $question->__set('name', $data['name']);
    $question->__set('type', $data['type']);
    var_dump($question);
    $question->save();
}

$bag['data'] = [];
$bag['data'] = ["exercise_id" => $bag['exercise_id'], 'questions' => Question::getQuestionsFromExercise( $bag['exercise_id'] )];
$bag['view'] = 'views/exercises/modify_form';
return $bag;
