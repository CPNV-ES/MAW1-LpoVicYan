<?php

$exercise = Exercise::getAnExercise( $bag['exercise_id'] );
$exercise->setStatus( 'answering' );
$exercise->save();
header( 'Location: /exercises' );