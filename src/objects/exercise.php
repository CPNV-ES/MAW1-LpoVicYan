<?php

/**
 * Title: index
 * Author: Menoud Yann  
 * Version: 1.0 from 29th August 2022
 */


/**
 * Contructor of Exercise
 */
class Exercise
{
  public $title;
  public $creation_date;
  public $modification_date;
  public $status;

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
   * Get all exercises
   */
  public function getAllExercises()
  {
    //code here...
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
