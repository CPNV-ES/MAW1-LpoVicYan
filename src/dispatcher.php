<?php
/**
 * Title: dispatcher
 * Author: Yann Menoud
 * Version: 1.0 from 7th September 2022
 */

function dispatch($bag)
{
    $matches = [];

    //-----------------------------------------------------------------------------
    if (preg_match('/^\/?$/', $bag['route'])) {
        $bag['view'] = 'view/site/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises$/', $bag['route'], $matches)) {
        $bag['view'] = 'controllers/exercices/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/new$/', $bag['route'], $matches)) {
        $bag['view'] = 'view/exercices/create_exercice';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/answering$/', $bag['route'], $matches)) {
        $bag['view'] = 'view/exercices/take_exercice';
    }
    //-----------------------------------------------------------------------------
    else {
        $bag['status_code'] = 404;
    }

    return $bag;
}

//=============================================================================
// Return the URL for the given named route (the opposite of the dispatcher)
function route($name) {
    return '/'.$name;
}
