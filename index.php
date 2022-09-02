<?php
/**
 * Title: index.php
 * Author: LPO & VIC & YAN
 * Date: 29 August 2022
 * Version: 1.0
 */

// Requirements
require "controller/exercices_controller.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

switch ($action) {
    case "exercices":
        loadExercicesPage();
        break;

    default:
        require_once "view/index.php";
        break;
}