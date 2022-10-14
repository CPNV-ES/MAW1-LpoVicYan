<?php

/**
 * Database.php
 * MAW 1.1 
 * Creator : Yann Menoud
 * Creation date 11.10.2022
 */

class Database
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . dbhost . ';dbname=' . dbname, dbuser, dbpass);
    }

    public function query($query, $classNameOfObjects)
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $listOfObjects = $statement->fetchAll(PDO::FETCH_CLASS, $classNameOfObjects);
        return $listOfObjects;
    }

}
