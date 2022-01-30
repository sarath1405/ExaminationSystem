<?php 
session_start();
include "question_db.php";

$testname = $_POST['tname'];

$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);
while($data = mysqli_fetch_array($result)) {
    echo $data;
}

$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);
$i = mysqli_num_rows($result);
$i++;

$_SESSION['testname'] = $testname;

$sql = "USE question_db CREATE TABLE $testname (id INT PRIMARY KEY, question TEXT, option1 TEXT, option2 TEXT, option3 TEXT, option4 TEXT, correct INT, author TEXT, d date default (curdate()))";

if($conn->query($sql) === TRUE) {
    header("Location:home.php?success=$testname created successfully");
    exit();
}
else {
    header("Location:addtest.php?error=$conn->error");
    exit();
}