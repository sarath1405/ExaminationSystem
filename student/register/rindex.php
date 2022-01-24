<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="/ExaminationSystem/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <span class="image">
            <img src="/ExaminationSystem/images/logo.png" alt="logo">
        </span>
        <span class="title">Online Examination</span>
        <span>
            <ul class="nav">
                <li><a href="/ExaminationSystem/index.php">Home</a></li>
                <li class="stud"><a href="/ExaminationSystem/student/login/sindex.php">Student</a></li>
                <li><a href="/ExaminationSystem/teacher/login/tindex.php">Teacher</a></li>
                <li><a href="https://github.com/sarath1405/OnlineExamination"><i class="fa fa-github"></i>  GitHub</a></li> 
            </ul>
        </span>
    </div>
    <form action="/ExaminationSystem/student/register/rlogin.php" method="post" class="form" autocomplete="off">
        <h2 class="formHeader">STUDENT REGISTRATION</h2>
        <div class="details">
            <?php
            if(isset($_GET['error'])) { ?>
                <p class="error">*<?php echo $_GET['error'];?></p>
           <?php } ?>
           <div class="username">
               <label for="user_name">Username</label><br>
               <input type="text" name="uname" placeholder="username"><br>
            </div>
            <div class="pass">
                <label for="password">Password</label><br>
                <input type="password" name="password" placeholder="passowrd"><br>
            </div>
            <label for="c_password">Confirm Password</label><br>
            <input type="password" name="c_password" placeholder="confirm password"><br>
            <div class="login1">
                <button type="submit">Register</button>
            </div>
        </div>
    </form>
    <div class="register">
        <p><i>Already registered?</i><a href="/ExaminationSystem/student/login/sindex.php"><button>Login</button></a></p>
    </div>
</body>
</html>