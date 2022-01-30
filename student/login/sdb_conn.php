<?php 

$s_name = "mysql-67603-0.cloudclusters.net";
$user = "admin";
$password = "Zur00QVU";
$db_name = "student_db";

$conn = mysqli_connect($s_name, $user, $password, $db_name);

if(!$conn) {
    echo "DataBase connection failed, Try again!";
}

?>