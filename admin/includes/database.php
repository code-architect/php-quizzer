<?php

$HOST = "localhost";
$DB_NAME = "php_quizzer";
$USER_NAME = "root";
$PASSWORD = "";

$mysqli = new mysqli($HOST, $USER_NAME, $PASSWORD, $DB_NAME);
$mysqli->set_charset("SET CHARACTER SET utf8");
$mysqli->query("SET SESSION collation_connection ='utf8_general_ci'");

if($mysqli->connect_errno)
{
    printf("Connection Failed: %s\n", $mysqli->connect_errno );
    exit();
}

//if (!$mysqli->set_charset("utf8")) {
//    printf("Error loading character set utf8: %s\n", $mysqli->error);
//    exit();
//}
//
//if (!$mysqli->query("SET collation_connection = utf8_czech_ci")) {
//    printf("Error loading collation_connection: %s\n", $mysqli->error);
//    exit();
//}
