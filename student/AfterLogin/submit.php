<?php

include "question_db.php";
include "sdb_conn.php";
include "testcheck_db.php";
session_start();

$test = $_SESSION['tname'];

$usern = $_SESSION['user'];

$sql1 = "SELECT * from $test";
$result1 = mysqli_query($conn, $sql1);

$choices = array();
$r = mysqli_num_rows($result1);
if($r==0) {
    header("Location:home.php?error=No questions found, please try after some time!");
    exit();
}

for($i=1; $i<=$r; $i++) {
    if(isset($_POST["question{$i}"])) {
        array_push($choices, $_POST["question{$i}"]);
    }
    else array_push($choices, 0);
}

$total = $r*5;

$answers = array();
while($data = mysqli_fetch_array($result1)) {
    array_push($answers, $data['correct']);
}

$score = 0;
$c=0;
$in=0;
$a=0;
for($i=0; $i<count($answers); $i++) {
    if($answers[$i]==$choices[$i]) {
        $score+=5;
        $c++;
        $a++;
    }
    else if($choices[$i]!=0) {
        $score--;
        $in++;
        $a++;
    }
}

$sql = "SELECT * FROM students WHERE user_name = '$usern'";
$result = mysqli_query($conn1, $sql);
$data = $result->fetch_array();

$value = $data['grade'];
$for10 = ($score*10)/$total;

$value = ($value+$for10)/2;

$sql = "UPDATE students SET grade=$value WHERE user_name='$usern'";
$result = mysqli_query($conn1, $sql);

$sql = "UPDATE students SET flag=1 WHERE user_name='$usern'";
$result = mysqli_query($conn1, $sql);

$sql = "INSERT INTO testchecker (test_name, stud_name, totalq, correct, incorrect, score, total) VALUES ('$test', '$usern', $r, $c, $in, $score, $total)";
$result = mysqli_query($conn2, $sql);

header("Location:result.php?success=<br> Total Questions: {$r}<br> Attempted: {$a}<br> Correct: {$c} <br>  Incorrect: {$in} <br><br>Total Score = {$score} / {$total}");

?>


