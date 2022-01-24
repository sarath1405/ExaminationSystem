<?php
session_start();
include "sdb_conn.php";

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

if(empty($uname)) {
    header("Location:sindex.php?error=Username is Required!");
    exit();
}
else if(empty($pass)) {
    header("Location:sindex.php?error=Password must not be empty!");
    exit();
}

$sql = "SELECT * FROM students WHERE user_name='$uname' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    if($row['user_name']===$uname && $row['password']===$pass) {
        echo "Login Successful!";
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location:/ExaminationSystem/student/AfterLogin/tests.php");
        exit();
    }
    else {
        header("Location:sindex.php?error=Login Details are case sensitive!");
        exit();
    }
}
else {
    $sql = "SELECT * FROM students WHERE user_name='$uname'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1) {
        header("Location:sindex.php?error=Incorrect Password!");
        exit();
    }
    else {
        header("Location:sindex.php?error=No Student found, please Register!");
        exit();
    }
}


