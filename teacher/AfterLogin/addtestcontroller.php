<?php 
session_start();
include "question_db.php";

$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);
$i = mysqli_num_rows($result);
$i++;
$testname = $_POST['tname'];

$_SESSION['testname'] = $testname;

$sql = "CREATE TABLE $testname (id INT PRIMARY KEY, question TEXT, option1 TEXT, option2 TEXT, option3 TEXT, option4 TEXT, correct INT, author TEXT, d date default curdate())";

if($conn->query($sql) === TRUE) {
    header("Location:home.php?success=$testname created successfully");
    exit();
}
else {
    header("Location:addtest.php?error=$conn->error");
    exit();
}