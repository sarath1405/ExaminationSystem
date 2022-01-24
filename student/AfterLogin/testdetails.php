<?php 
session_start();
include "question_db.php";
include "testcheck_db.php";

$tname = $_POST['test'];
$_SESSION['tname'] = $tname;

$sname = $_SESSION['user'];

if($tname == 0) {
    header("Location:tests.php?error=No Test Selected!!");
    exit();
}

$sql = "SELECT * FROM $tname";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) === 0) {
    header("Location:tests.php?error=No questions found in $tname !");
    exit();
}

$sql = "SELECT * FROM testchecker WHERE test_name='$tname' AND stud_name='$sname'";
$result = mysqli_query($conn2, $sql);

if(mysqli_num_rows($result) == 1) {
    header("Location:tests.php?error=You have already submitted $tname !");
    exit();
}

$sql = "SELECT * FROM $tname";

$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_array($result);

$author = $data['author'];

$date = $data['d'];

$c = mysqli_num_rows($result);

header("Location:duptests.php?details=Teacher Name: $author <br><br> Test created on: $date <br><br> Total Questions: $c <br><br> press ENTER to Start Test");
exit();