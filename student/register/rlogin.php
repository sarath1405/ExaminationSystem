<?php
session_start();

include "rdb_conn.php";

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

if(empty($uname)) {
    header("Location:rindex.php?error=Username is Required!");
    exit();
}
else if(empty($pass)) {
    header("Location:rindex.php?error=Password must not be empty!");
    exit();
}
else if(empty($c_pass)) {
    header("Location:rindex.php?error=confirmation password must not be empty!");
    exit();
}

if($pass != $c_pass) {
    header("Location:rindex.php?error=Passwords do not match!");
    exit();
}

$sql = "SELECT * FROM students WHERE user_name='$uname'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    header("Location:rindex.php?error=Username already exists!");
    exit();
}
else {
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
    $c = mysqli_num_rows($result);

    $sql = "INSERT INTO students (id,user_name, password, grade, flag) VALUES ($c,'$uname', '$pass', 10, 0)";
    if($conn->query($sql) === TRUE) {
        header("Location:/ExaminationSystem/student/login/sindex.php?success=Registration Successful, please Login!");
        exit();
    }
    else {
        header("Location:rindex.php?error=DataBase connection failed!");
        exit();
    }
}