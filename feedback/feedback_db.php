<?php

$name ="localhost";
$user = "root";
$password = "";
$db_name = "feedback_db";

$conn = mysqli_connect($name, $user, $password, $db_name);

if(!$conn) {
    header("Location:feedback.php?error=DataBase connection failed!");
}