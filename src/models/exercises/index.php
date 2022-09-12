<?php

/**
 * Title: index
 * Author: Menoud Yann
 * Version: 1.0 from 09th September 2022
 */

define('USERS_DATA_PATHNAME', BASE_DIR . '/data/exercises.json');
require_once SOURCE_DIR . '/objects/exercise.php'; 

/**
 * Get all exercises
 */

function getAllExercises()
{
    try {
        $exercisesJson = json_decode(file_get_contents(USERS_DATA_PATHNAME), true);
        $exercisesAsOjects = array();
        foreach ($exercisesJson as $exercise) {
            $objectExercice = new Exercise($exercise['title'], $exercise['creation_date'], $exercise['modification_date'], $exercise['status']); 
            array_push($exercisesAsOjects, $objectExercice); 
        }
        return $exercisesJson;
    } catch (Exception $e) {
        // if there is no exercise
        return [];
    }
}