<?php
/**
 * Title : create questions
 * Author : Victorien Montavon
 * Version : 1.0 from 16.09.22
 */
class Question {
    //properties
    protected $label;
    protected $value_kind;
    //methods
    function getQuestion() {
        $this->label = $label;
        $this->value_kind = $value_kind;
    }
}
{
    function insertQuestion()
    $servername = "localhost";
    $username = "Looper";
    $password = "";
    $dbname = "exerciselooper";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO questions ('name', 'type',) VALUES ('$label' , '$value_kind)";

    if ($conn->query($sql) === TRUE) {
        echo "Question Added";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

?>