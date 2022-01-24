<?php 

$s_name = "localhost";
$user = "root";
$password = "";
$db_name = "testcheck_db";

$conn2 = mysqli_connect($s_name, $user, $password, $db_name);

if(!$conn2) {
    echo "DataBase connection failed, Try again!";
}

?>