<?php 
session_start();
include "question_db.php";
include "testcheck_db.php";

$tname = $_POST['test'];
$_SESSION['tname'] = $tname;

$sname = $_SESSION['user'];

if($tname == 0) {
    header("Location:deletetest.php?error=No Test Selected!!");
    exit();
}

$sql = "DROP TABLE $tname";
$result = mysqli_query($conn, $sql);
header("Location:deletetest.php?success=$tname Deleted successfully!");
exit();