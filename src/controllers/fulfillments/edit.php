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

    if ($bag['post_data']) {
        $fulfillment = $bag['post_data']['fulfillment'];
        $commit = $bag['post_data']['commit'];

        foreach ($fulfillment['answers_attributes'] as $answer) {
            $answerInDB = Answer::loadById($answer['answer_id']);
            $answerInDB->setAnswer($answer['value']);
            $answerInDB->save();
        }
    }

    $exercise_id = $bag['exercise_id'];
    $fulfillment_id = $bag['fulfillment_id'];
    $answers = Answer::getAllByFulfillment($fulfillment_id);
    $questions = Question::getAll($exercise_id);
    $questions_answers = [];

    foreach ($questions as $question) {
        foreach ($answers as $answer) {
            if ($question->getId() == $answer->getQuestionId())
            $questions_answers[$question->getId()] = $answer;
        }
    }
    $bag['data'] = ['questions' => $questions, 'questions_answers' => $questions_answers, 'exercise' => Exercise::getAnExercise($exercise_id), 'answers' => $answers, 'fulfillment_id' => $fulfillment_id];
    $bag['view'] = 'views/fulfillments/edit';
    return $bag;
}

