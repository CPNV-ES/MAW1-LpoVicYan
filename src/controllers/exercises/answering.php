<?php
/*
 * Title: answering
 * Author: LPOdev
 * Version: 1.0 from 23 November 2022
 */

$exercise = Exercise::getAnExercise($bag['exercise_id']);
$exercise->setStatus('answering');
$exercise->save();
header('Location: /exercises');