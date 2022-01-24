<?php

$s_name = "localhost";
$user = "root";
$pass = "";
$db_name = "questions_db";

$conn = mysqli_connect($s_name, $user, $pass, $db_name);

if(!$conn) {
    echo "DataBase connection failed, Try again!";
} 

?>