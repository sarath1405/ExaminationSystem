<?php
session_start();
include "question_db.php";

$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$correct = $_POST['correct'];

if(empty($question)) {
    header("Location:home.php?error=Question is Required!");
    exit();
}
else if(empty($option1)) {
    header("Location:home.php?error=Option 1 is Required!");
    exit();
}
else if(empty($option2)) {
    header("Location:home.php?error=Option 2 is Required!");
    exit();
}
else if(empty($option3)) {
    header("Location:home.php?error=Option 3 is Required!");
    exit();
}
else if(empty($option4)) {
    header("Location:home.php?error=Option 4 is Required!");
    exit();
}
else if(empty($correct)) {
    header("Location:home.php?error=Correct Option is not selected!");
    exit();
}

$testname = $_SESSION['testname'];
$author = $_SESSION['user_name'];

$sql = "SELECT * FROM $testname";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

$sql = "INSERT INTO $testname (id, question, option1, option2, option3, option4, correct, author) VALUES ($num, '$question', '$option1', '$option2', '$option3', '$option4', '$correct', '$author')";

if($conn->query($sql) === TRUE) {
    header("Location:home.php?success=Question added successfully into $testname");
}
