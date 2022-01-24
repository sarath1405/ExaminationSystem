<?php
session_start();
include "tdb_conn.php";

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
$code = validate($_POST['scode']);

if(empty($uname)) {
    header("Location:tindex.php?error=Username is Required!");
    exit();
}
else if(empty($pass)) {
    header("Location:tindex.php?error=Password is Required!");
    exit();
}
else if(empty($code)) {
    header("Location:tindex.php?error=Security code is Required!");
    exit();
}
else if($code != "140302") {
    header("Location:tindex.php?error=Security code is Incorrect!");
    exit();
}

$sql = "SELECT * FROM teachers WHERE user_name='$uname' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['user_name']===$uname && $row['password']===$pass) {
        echo "Login Successful!";
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location:/teacher/AfterLogin/home1.php");
        exit();
    }
    else {
        header("Location:tindex.php?error=Login Details are case sensitive!");
        exit();
    }
}
else {
    $sql = "SELECT * FROM teachers WHERE user_name='$uname'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1) {
        header("Location:tindex.php?error=Incorrect Password!");
        exit();
    }
    else {
        header("Location:tindex.php?error=No Teacher found, please Register!");
        exit();
    }
}


