<?php
//=============================================================================
// Dispatcher script for ooless web apps.
// Author:  Pascal Hurni
// Date:    2022-08-27, 03-05-2014
//=============================================================================

//=============================================================================
// Decode the given route and return the bag augmented with:
//    handler        string  PHP file name that should handle this request (without php extension).
//    status_code    int     HTTP code to return if already determined.

function dispatch($bag)
{
    $matches = [];

    //-----------------------------------------------------------------------------
    if (preg_match('/^\/?$/', $bag['route'])) {
        $bag['view'] = 'view/site/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises$/', $bag['route'], $matches)) {
        $bag['view'] = 'view/exercices/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/new$/', $bag['route'], $matches)) {
        $bag['view'] = 'view/exercices/create_exercice';
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
