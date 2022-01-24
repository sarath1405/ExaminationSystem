<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teacher Home</title>
        <link rel="stylesheet" href="/ExaminationSystem/teacherlogin2.css">
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
                    <li class="welcome"><span>Welcome,</span> <?php echo strtoupper($_SESSION['user_name']);?></li>
                    <li class="logout"><a href="/ExaminationSystem/teacher/login/tlogout.php">Logout</a></li> 
                </ul>
            </span>
        </div>
        <section class="options">
            <div class="option">
                <a href="/ExaminationSystem/teacher/AfterLogin/addtest.php">
                <span><img src="/ExaminationSystem/images/th.jpg" alt="add"></span>
                <h2>ADD EXAM</h2>
                </a>
            </div>
            <div class="option">
                <a href="/ExaminationSystem/teacher/AfterLogin/deletetest.php">
                <span><img src="/ExaminationSystem/images/delete.jpg" alt="add"></span>
                <h2>DELETE EXAM</h2>
                </a>
            </div>
            <div class="option">
                <a href="/ExaminationSystem/teacher/AfterLogin/report.php">
                <span><img src="/ExaminationSystem/images/analysis.jpg" alt="analysis"></span>
                <h2>REPORT</h2>
                </a>
            </div>
        </section>
    </body>
    </html>

    <?php
}
else {
   header("Location:tindex.php?error=unable to reload please try again!");
   exit();
}

?>