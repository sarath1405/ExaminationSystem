<?php 

$s_name = "localhost";
$user = "root";
$password = "";
$db_name = "student_db";

$conn = mysqli_connect($s_name, $user, $password, $db_name);

if(!$conn) {
    echo "DataBase connection failed, Try again!";
}

?>