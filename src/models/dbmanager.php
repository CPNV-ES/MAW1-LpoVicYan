<?php
/**
 *  Title: dbmanager
 *  Author: Menoud Yann
 *  Creation date: 26.06.2022
 *  From: https://github.com/samuelroland/KanFF
 */

/**
 * Create a connection to the database
 */
function getPDO()
{
    require ".const.php";

    $res = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    $res->exec("set names utf8");   
    return $res;
}



?>