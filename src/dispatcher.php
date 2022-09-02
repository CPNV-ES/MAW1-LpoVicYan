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

    // If any match defines a 'view', it should use our one and only layout.
    $bag['layout'] = 'views/layout';

    //-----------------------------------------------------------------------------
    if (preg_match('/^\/?$/', $bag['route'])) {
        $bag['view'] = 'views/site/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/(login|register)$/', $bag['route'], $matches)) {
        if ($bag['method'] == 'POST') {
            $bag['handler'] = 'controllers/site/'.$matches[1];
        } elseif ($bag['method'] == 'GET') {
            $bag['view'] = 'views/site/'.$matches[1];
        }
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/logout$/', $bag['route']) && $bag['method'] == 'POST') {
        $bag['handler'] = 'controllers/site/logout';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/search$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/images/search';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/images$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/images/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/users$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/users/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/users\/images\/(.+)$/', $bag['route'], $matches)) {
        $bag['handler']  = 'controllers/users/user-images';
        $bag['username'] = $matches[1];
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
