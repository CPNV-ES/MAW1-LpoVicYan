<?php

/**
 * Title: dispatcher
 * Author: Pascal Hurni
 * Last modification by Luís Pedro Pinheiro
 * Version: 2.0 from 30th November 2022
 */

function dispatch($bag)
{
    $matches = [];

    //-----------------------------------------------------------------------------

    if (preg_match('/^\/?$/', $bag['route'])) {
        $bag['view'] = 'views/site/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\w+)\/fields$/', $bag['route'], $matches)) {
        $bag['post_data'] = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bag['handler'] = 'controllers/exercises/modify';
            $bag['exercise_id'] = $matches[1];
            $bag['post_data'] = [$_POST['field'], 'commit' => $_POST['commit']];
        } else {
            $bag['handler'] = 'controllers/exercises/modify';
            $bag['exercise_id'] = $matches[1];
        }

        $bag['handler'] = 'controllers/exercises/modify';
        $bag['exercise_id'] = $matches[1];
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\w+)\/fields\/(\w+)\/edit$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/questions/modify';
        $bag['exercise_id'] = $matches[1];
        $bag['question_id'] = $matches[2];
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\w+)\/fields\/(\d+)$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/questions/delete';
        $bag['exercise_id'] = $matches[1];
        $bag['question_id'] = $matches[2];
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\d+)$/', $bag['route'], $matches)) {
        $bag['id'] = $matches[1];
        if ($_GET['exercise']) {
            $bag['handler'] = 'controllers/exercises/close';
        } else {
            $bag['handler'] = 'controllers/exercises/delete_exercise';
        }
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises$/', $bag['route'], $matches)) {
        if (isset($_POST['exercise_title'])) {
            $bag['post_exercise'] = $_POST['exercise_title'];
            $bag['handler'] = 'controllers/exercises/create_exercises';
        } else {
            $bag['handler'] = 'controllers/exercises/index';
        }
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/new$/', $bag['route'], $matches)) {
        $bag['view'] = 'views/exercises/new';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/answering$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/exercises/take_exercise';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(.+)\/create_questions$/', $bag['route'], $matches)) {
        $bag['post_exercise'] = $_POST['exercise_title'];
        $bag['post_question'] = $_POST['field'];

        if ($bag['post_exercise']) {
            $bag['handler'] = 'controllers/exercises/create_exercises';
        } elseif ($bag['post_question']) {
            $bag['handler'] = 'controllers/questions/index';
        }
        $bag['view'] = 'views/exercises/create_questions';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\d+)\/fulfillments\/new$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/fulfillments/index';
        $bag['exercise_id'] = $matches[1];
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\d+)\/fulfillments$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/fulfillments/new';
        $bag['fulfillments'] = $_POST['fulfillment'];
        $bag['exercise_id'] = $matches[1];
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\d+)\/fulfillments\/(\d+)\/edit$/', $bag['route'], $matches)) {
        $bag['post_data'] = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bag['post_data'] = ['fulfillment' => $_POST['fulfillment'], 'commit' => $_POST['commit']];
        }
        $bag['exercise_id'] = $matches[1];
        $bag['fulfillment_id'] = $matches[2];
        $bag['handler'] = 'controllers/fulfillments/edit';
    }
    //----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\d+)\/answering$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/exercises/answering';
        $bag['exercise_id'] = $matches[1];
    }
    //----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\d+)\/results$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/exercises/results';
        $bag['exercise_id'] = $matches[1];
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\d+)\/fulfillments\/(\d+)\/answers$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/exercises/answers';
        $bag['exercise_id'] = $matches[1];
        $bag['fulfillment_id'] = $matches[2];
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(\d+)\/question\/(\d+)$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controllers/exercises/answers_results';
        $bag['exercise_id'] = $matches[1];
        $bag['answer_id'] = $matches[2];
    }
    //-----------------------------------------------------------------------------

    else {
        $bag['status_code'] = 404;
    }
    return $bag;
}

//=============================================================================
// Return the URL for the given named route (the opposite of the dispatcher)
function route($name)
{
    return '/' . $name;
}