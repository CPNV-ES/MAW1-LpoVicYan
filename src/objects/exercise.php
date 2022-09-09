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


  public function __construct($title, $creation_date, $modification_date, $status)
  {
    $this->title = $title;
    $this->creation_date = $creation_date;
    $this->modification_date = $modification_date;
    $this->status = $status;
  }
}
