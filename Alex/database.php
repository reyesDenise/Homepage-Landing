<?php

$host = "localhost";
$dbname = "alex";
$username = "root";
$password = "";

$db = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($db->connect_errno) {
    die("Connection error: " . $db->connect_error);
}

return $db;