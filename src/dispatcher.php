<?php
/**
 * Title: dispatcher
 * Author: Pascal Hurni
 * Last modification by Yann Menoud
 * Version: 1.0 from 7th September 2022
 */

function dispatch( $bag )
{
    $matches = [];

    //-----------------------------------------------------------------------------

    if ( preg_match( '/^\/?$/', $bag['route'] ) )
    {
        $bag['view'] = 'views/site/index';
    }

    //-----------------------------------------------------------------------------

    elseif ( preg_match( '/^\/exercises\/(\w+)\/fields$/', $bag['route'], $matches ) )
    {
        $bag['post_data'] = [];

        if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
        {
            $bag['handler']     = 'controllers/exercises/modify';
            $bag['exercise_id'] = $matches[1];
            $bag['post_data']   = [$_POST['field'], 'commit' => $_POST['commit']];
        }
        else
        {
            $bag['handler']     = 'controllers/exercises/modify';
            $bag['exercise_id'] = $matches[1];
        }

    }
    //-----------------------------------------------------------------------------

    elseif ( preg_match( '/^\/exercises\/(\w+)\/fields\/(\w+)\/edit$/', $bag['route'], $matches ) )
    {
        $bag['handler']     = 'controllers/questions/modify';
        $bag['exercise_id'] = $matches[1];
        $bag['question_id'] = $matches[2];

    }

    //-----------------------------------------------------------------------------

    elseif ( preg_match( '/^\/exercises\/(\w+)\/fields\/(\w+)/', $bag['route'], $matches ) )
    {
        $bag['handler']     = 'controllers/questions/modify';
        $bag['exercise_id'] = $matches[1];
        $bag['question_id'] = $matches[2];

    }

    //-----------------------------------------------------------------------------

    elseif ( preg_match( '/^\/exercises\/(.+)$/', $bag['route'], $matches ) )
    {
        $bag['handler'] = 'controllers/exercises/delete_exercise';
        $bag['id']      = $matches[1];
    }
    //-----------------------------------------------------------------------------

    elseif ( preg_match( '/^\/manage-exercises$/', $bag['route'], $matches ) )
    {
        $bag['handler'] = 'controllers/exercises/index';
    }

    //-----------------------------------------------------------------------------

    elseif ( preg_match( '/^\/exercises\/create_exercise$/', $bag['route'], $matches ) )
    {
        $bag['view'] = 'views/exercises/create_exercise';

    }

    //-----------------------------------------------------------------------------

    elseif ( preg_match( '/^\/exercises\/answering$/', $bag['route'], $matches ) )
    {
        $bag['view'] = 'views/exercises/take_exercice';
    }

    //-----------------------------------------------------------------------------

    elseif ( preg_match( '/^\/exercises\/(.+)\/create_questions$/', $bag['route'], $matches ) )
    {
        $bag['post_exercise'] = $_POST['exercise_title'];
        $bag['post_question'] = $_POST['field'];

        if ( $bag['post_exercise'] )
        {
            $bag['handler'] = 'controllers/exercises/create_exercises';
        }
        elseif ( $bag['post_question'] )
        {
            $bag['handler'] = 'controllers/questions/index';
        }
        $bag['view'] = 'views/exercises/create_questions';
    }
    //-----------------------------------------------------------------------------

    else
    {
        $bag['status_code'] = 404;
    }

    return $bag;
}

//=============================================================================
// Return the URL for the given named route (the opposite of the dispatcher)
function route( $name )
{
    return '/' . $name;
}