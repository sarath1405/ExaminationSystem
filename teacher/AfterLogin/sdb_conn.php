<?php 

$s_name = "mysql-67603-0.cloudclusters.net:13968";
$user = "admin";
$password = "Zur00QVU";
$db_name = "student_db";

$conn1 = mysqli_connect($s_name, $user, $password, $db_name);

if(!$conn1) {
    echo "DataBase connection failed, Try again!";
}

?>