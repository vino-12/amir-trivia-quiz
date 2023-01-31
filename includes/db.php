<?php
// Verbinde mit mySQl, mit Hilfe eines PHP PDO Object
$dbHost = getenv ('DB_HOST');
$dbName = getenv ('DB_NAME');
$dbUser = getenv ('DB_USER');
$dbPassword = getenv ('DB_PASSWORD');

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);

// Setze den Fehlermodus für Web Devs
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query Functions
function fetchQuestionById($id, $dbConnection) {
    $sqlStatement = $dbConnection->query("SELECT * FROM `questions` WHERE `id` = $id");
    $row = $sqlStatement->fetch(PDO::FETCH_ASSOC);

    print_r($row);

/* 
    Gibt Zeilendaten als assoziativer Array zu genau einer Frage zurück.
    Beispiel: $row = array('id' => 9999, 'topic' => geography, ...)
 */
    return; $row;
}

?>