<?php
/*
 * Project: MAW1-LpoVicYan
 * Title: modify
 * Author: LPOdev ++ copy VicMtn
 * Version: 1.0 from the 7th October 2022
 */

if ($bag['post_data']) {
    $data = $bag['post_data'][0];

    if ($bag['post_data']['commit'] === 'Update Field') {
        $question = Question::getById($data['id']);
        $question->setName($data['name']);
        $question->setType($data['type']);
    } else {
        $question = new Question(0, $data['label'], $data['value_kind'], count(Question::getAll($bag['exercise_id'])) + 1, $bag['exercise_id']);
    }
    $question->save();
}
$exercise = Exercise::getAnExercise($bag['exercise_id']);

$bag['data'] = [];
$bag['data'] = ['exercise' => $exercise, 'questions' => Question::getAll($bag['exercise_id'])];
$bag['view'] = 'views/exercises/modify_form';

return $bag;