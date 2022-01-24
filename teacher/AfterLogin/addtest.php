<?php 
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exam</title>
    <link rel="stylesheet" href="/teacherlogin2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
    <span class="image">
        <img src="/images/logo.png" alt="logo">
    </span>
    <span class="title">Online Examination</span>
    <span>
        <ul class="nav">
            <li class="welcome"><span>Welcome,</span> <?php echo strtoupper($_SESSION['user_name']);?></li>
            <li><a href="home1.php">Home</a></li>
            <li class="logout"><a href="/teacher/login/tlogout.php">Logout</a></li> 
        </ul>
    </span>
</div>
    <form action="addtestcontroller.php" method="post" class="form" autocomplete="off">
        <h2 class="formHeader">EXAM NAME</h2>
        <div class="details">
            *Exam Name should not contain any spaces!!
            <?php 
            if(isset($_GET['error'])) { ?>
                <p class="error">*<?php echo $_GET['error'];?></p>
            <?php } 
            else if(isset($_GET['success'])) { ?>
                <p class="success">*<?php echo $_GET['success'];?></p>
            <?php } ?>
            <div class="username">
                <input type="text" name="tname" placeholder="exam name"><br>
            </div>
            <div class="login1">
                <button type="submit">Add Exam</button>
            </div>
        </div>
    </form>
</body>
</html>