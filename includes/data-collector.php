<?php

/* Muss vor dem Gebrauch von $_SESSION ausgeführt werden.
Am Besten ganz am Anfang einer Webseite, bevor irgendwelche
ander PHP-Skripte ausgeführt werden. */

session_start();

// Hilfswerkzeuge laden
include 'tools.php';

if (isset($_SESSION["quiz"])) $quiz = $_SESSION["quiz"];
else $quiz = null;

prettyPrint($quiz, '$quiz =');

if (isset($_POST["lastQuestionIndex"])){
    $lastQuestion = intval($_POST["lastQuestionIndex"]);
}
else {
    $lastQuestionIndex = -1;
}

prettyPrint($lastQuestionIndex, '$lastQuestionIndex =');



?>