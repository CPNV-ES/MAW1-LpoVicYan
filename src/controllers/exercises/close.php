<?php

$exercise = Exercise::getAnExercise( $bag['id'] );
$exercise->setStatus( 'closed' );
$exercise->save();
header( 'Location: /exercises' );