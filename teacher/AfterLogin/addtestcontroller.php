<?php 
session_start();
include "question_db.php";

$testname = $_POST['tname'];

$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);
$i = 0;
while($data = mysqli_fetch_array($result)) {
    if($data[$i++] === $testname) {
        header("Location:addtest.php?error=$testname already exits!");
        exit();
    }
}

$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);
$i = mysqli_num_rows($result);
$i++;

$_SESSION['testname'] = $testname;

$sql = "CREATE TABLE $testname (id INT PRIMARY KEY, question TEXT, option1 TEXT, option2 TEXT, option3 TEXT, option4 TEXT, correct INT, author TEXT, d date default (curdate()))";

if($conn->query($sql) === TRUE) {
    header("Location:home.php?success=$testname created successfully");
    exit();
}
else {
    header("Location:addtest.php?error=Exam name should not contain spaces or special characters!");
    exit();
}