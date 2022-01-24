<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="/ExaminationSystem/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
    </script>
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
                <li class="stud"><a href=""><span>Student</span></a></li>
                <li><a href="/ExaminationSystem/teacher/login/tindex.php">Teacher</a></li>
                <li><a href="https://github.com/sarath1405/OnlineExamination"><i class="fa fa-github"></i>  GitHub</a></li> 
            </ul>
        </span>
    </div>
    <form action="/ExaminationSystem/student/login/slogin.php" method="post" class="form" autocomplete="off" target="_self">
        <h2 class="formHeader">STUDENT LOGIN</h2>
        <div class="details">
            <?php 
            if(isset($_GET['error'])) { ?>
                <p class="error">*<?php echo $_GET['error'];?></p>
            <?php } 
            else if(isset($_GET['success'])) { ?>
                <p class="success">*<?php echo $_GET['success'];?></p>
            <?php } ?>
            <div class="username">
                <label for="user_name">Username</label><br>
                <input type="text" name="uname" placeholder="Username"><br>
            </div>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Password"><br>
            <div class="login1">
                <button type="submit">Login</button>
            </div>
        </div>
    </form>
    <div class="register">
        <p><i>New Student?</i><a href="/ExaminationSystem/student/register/rindex.php"><button>Register</button></a></p>
    </div>
</body>
</html>