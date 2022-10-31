<?php 

if ($bag['handler']) {
   $exercise = new Exercise(0, $bag['post_exercise'], date('d-m-y h:i:s'), date('d-m-y h:i:s'), 'building');
   $bag['data'] = $exercise->save();
}