<?php

$dbHost = "db";
$dbUsername = "user";
$dbPassword = "user";
$dbName = "default";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
