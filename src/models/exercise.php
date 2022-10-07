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
  protected $id;
  protected $title;
  protected $creation_date;
  protected $modification_date;
  protected $status;

  /**
   * Constructor of Exercise
   */
  public function __construct($id, $title, $creation_date, $modification_date, $status)
  {
    $this->id = $id;
    $this->title = $title;
    $this->creation_date = $creation_date;
    $this->modification_date = $modification_date;
    $this->status = $status;
  }

  /**
   * Get all exercises of a status
   */
  static function getAllExercises($status)
  {
    try {
      $exercisesAsObjects = [];
      $res = getConnector();
      $exercises = $res->query('SELECT * FROM exercises WHERE status = ? ;', $status)->fetchAll();
      foreach ($exercises as $exercise) {
        $exerciseAsObject = new Exercise($exercise['id'], $exercise['title'], $exercise['creation_date'], $exercise['modification_date'], $exercise['status']);
        array_push($exercisesAsObjects, $exerciseAsObject);
      }
      unset($res);
      return $exercisesAsObjects;
    } catch (Exception $e) {
    }
  }

  /**
   * Get an exercise
   */
  static function getAnExercise($id)
  {
    $res = getConnector();
    $exercise = $res->query('SELECT * FROM exercises WHERE id = ?', $id)->fetchArray();
    $exerciseAsObject = new Exercise($exercise['id'], $exercise['title'], $exercise['creation_date'], $exercise['modification_date'], $exercise['status']);
    return $exerciseAsObject;
  }

  /**
   * Create an exercise
   */
  static function save($exercise)
  {
    $res = getConnector();
    $exerciseToCreate = array('title' => $exercise['title'], 'creation_date' => $exercise['creation_date'], 'modification_date' => $exercise['modification_date'], 'status' => $exercise['status']);



    if ($exercise->getId() == 0 || $exercise->getId() == null) {
      $query_result = $res->insert('exercises', $exerciseToCreate);
      $query_result = $res->lastInsertID();
      unset($query_result);
    } else {
      $query_result = $res->update('exercise', $exercise, 'WHERE id = ' . $exercise->getId);
    }
  }


  /**
   * Delete an exercise
   */
  static function deleteAnExercise($id)
  {
    $res  = getConnector();
    $data = ['name' => 'id', 'value' => $id];
    $res->delete("exercises", $data);
    unset($res);
  }


  /**
   * Get id
   */
  public function getId()
  {
    return $this->id;
  }

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
