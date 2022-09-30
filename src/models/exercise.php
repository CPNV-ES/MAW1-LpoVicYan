<?php

/**
 * Title: exercise.php
 * Author: Menoud Yann  
 * Version: 3.0 from 16th September 2022
 */

define('USERS_DATA_PATHNAME', BASE_DIR . '/data/exercises.json');


/**
 * Contructor of Exercise
 */
class Exercise
{
  protected $title;
  protected $creation_date;
  protected $modification_date;
  protected $status;

  /**
   * Constructor of Exercise
   */
  public function __construct($title, $creation_date, $modification_date, $status)
  {
    $this->title = $title;
    $this->creation_date = $creation_date;
    $this->modification_date = $modification_date;
    $this->status = $status;
  }

  /**
   * Get all exercise
   */
  static function getAllExercises()
  {
    try {
      $exercisesAsObjects = [];
      $res = getConnector();
      $exercises = $res->query('SELECT * FROM exercises;')->fetchAll();
      foreach ($exercises as $exercise) {
        $exerciseAsObject = new Exercise($exercise['title'], $exercise['creation_date'], $exercise['modification_date'], $exercise['status']);
        array_push($exercisesAsObjects, $exerciseAsObject);
      }
      unset($res);
      return $exercisesAsObjects;
    } catch (Exception $e) {
    }
  }

  /*    static function getAllExercises()
  {
    try {
      $exercisesJson = json_decode(file_get_contents(USERS_DATA_PATHNAME), true);
      $exercisesAsOjects = array();
      foreach ($exercisesJson as $exercise) {
        $objectExercice = new Exercise($exercise['title'], $exercise['creation_date'], $exercise['modification_date'], $exercise['status']);
        array_push($exercisesAsOjects, $objectExercice);
      }
      return $exercisesAsOjects;
    } catch (Exception $e) {
      // if there is no exercise
      return [];
    }
  } */

  /**
   * Get title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Get creation date
   */
  public function getCreationDate()
  {
    return $this->creation_date;
  }

  /**
   * Get last modification date
   */
  public function getModificationDate()
  {
    return $this->modification_date;
  }

  /**
   * Get status of exercise
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set Title of exercise
   */
  public function setTitle($newTitle)
  {
    $this->title = $newTitle;
  }

  /**
   * Set modification date of exercise
   */
  public function setModificationDate($newModificationDAte)
  {
    $this->modification_date = $newModificationDAte;
  }


  /**
   * Set status of exercise
   */
  public function setStatus($newStatus)
  {
    $this->status = $newStatus;
  }
}
