<?php

$s_name_ = "localhost";
$username_ = "root";
$password_ = "";
$db_name_ = "student_db";

$conn = mysqli_connect($s_name_, $username_, $password_, $db_name_);

if(!$conn) {
    echo "DataBase connection failed, Try again!";
}

?>