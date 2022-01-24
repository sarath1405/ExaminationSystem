<?php
session_start();
include "trdb_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);
$c_pass = validate($_POST['c_password']);
$scode = validate($_POST['scode']);

if(empty($uname)) {
    header("Location:trindex.php?error=Username is Required!");
    exit();
}
else if(empty($pass)) {
    header("Location:trindex.php?error=Password must not be empty!");
    exit();
}
else if(empty($c_pass)) {
    header("Location:trindex.php?error=confirmation password must not be empty!");
    exit();
}
else if($scode!="140302") {
    header("Location:trindex.php?error=Security Code is Incorrect!");
    exit();
}

if($pass != $c_pass) {
    header("Location:trindex.php?error=Passwords do not match!");
    exit();
}

$sql = "SELECT * FROM teachers WHERE user_name='$uname'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    header("Location:trindex.php?error=Username already exists!");
    exit();
}
else {
    $sql = "SELECT * FROM teachers";
    $result = mysqli_query($conn, $sql);
    $c = mysqli_num_rows($result);

    $sql = "INSERT INTO teachers (id,user_name, password) VALUES ($c,'$uname', '$pass')";
    if($conn->query($sql) === TRUE) {
        header("Location:/ExaminationSystem/teacher/login/tindex.php?success=Registration Successful, please Login!");
        exit();
    }
    else {
        header("Location:trindex.php?error=DataBase connection failed!");
        exit();
    }
}