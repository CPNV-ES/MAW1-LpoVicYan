<?php
/**
 * Title: index
 * Author: Menoud Yann
 * Version: 1.0 from 09th September 2022
 */

define('USERS_DATA_PATHNAME', BASE_DIR.'/data/exercises.json');

/**
 * Get all exercises
 */

 function getAllExercises() {
    try {
        return json_decode(file_get_contents(USERS_DATA_PATHNAME), true);
    }
    catch (Exception $e) {
        // The file does not yet exist, so there's no exercices
        return [];
    }
 }

?>