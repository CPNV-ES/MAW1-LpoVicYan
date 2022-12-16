<?php

/**
 * Title: New
 * Author: Yann Menoud
 * Version: 1.0 from 16.11.2022
 */


/**
 * If $bag['handler] is receive
 */
if ($bag['handler']) {
    $exercise_id = $bag['exercise_id'];
    $fulfillment_id = $bag['fulfillment_id'];

    $newFulfillment = new Fulfillment(0, date('d-m-y h:i:s'), $exercise_id);
    $fulfillment_id = $newFulfillment->create();

    foreach ($bag['fulfillments']['answers_attributes'] as $fulfillment) {
            $answer = new Answer(0, date("Y-m-d H:i:s"), $fulfillment['value'], $fulfillment['question_id'], $fulfillment_id );
            $answer_id = $answer->save($fulfillment_id);
            $answer = Answer::loadById($answer_id);
    }
    header('Location: /exercises/' . $bag['exercise_id'] . '/fulfillments/' . $fulfillment_id .   '/edit');
}
