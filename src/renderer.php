<?php
//=============================================================================
// Renderer script for ooless web apps.
// Author:  Pascal Hurni
// Date:    2022-08-27, 03-05-2014
//=============================================================================

// This function will send out the headers and the body of the response, it does not return any value.
function render($bag)
{
    // Send the desired response headers if any
    if (array_key_exists('headers', $bag)) {
        foreach ($bag['headers'] as $name => $value) {
            header("$name: $value");
        }
    }

    // Send the desired HTTP status code
    if (array_key_exists('status_code', $bag)) {
        header(' ', false, $bag['status_code']);

        // Is there an error without a specified view?
        if (($bag['status_code'] >= 400) && !array_key_exists('view', $bag)) {
            // Yep, specify our own custom error page view
            $bag['view'] = 'views/error'.$bag['status_code'];
        }
    }

    // Render a view if desired
    if (array_key_exists('view', $bag)) {
        // Expose data directly to the view
        $data = $bag['data'] ?? [];
        
        include SOURCE_DIR.'/'.$bag['view'].'.php';
    }
}
