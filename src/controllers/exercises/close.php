<?php
/*
 * Title: close
 * Author: LPOdev
 * Version: 1.0 from 23 November 2022
 */

$exercise = Exercise::getAnExercise($bag['id']);
$exercise->setStatus('closed');
$exercise->save();
header('Location: /exercises');