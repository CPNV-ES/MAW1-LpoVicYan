<?php

/*
 * Title: delete
 * Author: LPOdev
 * Version: 1.0 from 4th November 2022
 */

/**
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    $question = Question::getById($bag['question_id']);
    $question->delete();
    header('Location: /exercises/' . $bag['exercise_id'] . '/fields');
}