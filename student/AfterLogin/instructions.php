<?php
session_start();

include "question_db.php";
include "sdb_conn.php";

$_SESSION['user'] = $_SESSION['user_name'];

$sql = "SELECT * FROM students WHERE user_name = '$_SESSION[user_name]'";

$result = mysqli_query($conn1, $sql);

$data = $result->fetch_array();

$_SESSION['grade'] = $data['grade'];

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instructions</title>
        <link rel="stylesheet" href="/ExaminationSystem/AfterLogin.css">
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
                    <li class="welcome"><span>welcome,</span> <?php echo strtoupper($_SESSION['user_name']);?></li>
                    <li class="welcome"><span>Grade</span> <?php echo $_SESSION['grade'];?></li>
                    <li class="logout"><a href="/ExaminationSystem/student/login/slogout.php">Logout</a></li>
                </ul>
            </span>
        </div>
        <div class="exambox">
            <form action="home.php" method="post" autocomplete="off">
                <h2>Instructions</h2>
                <div class="questionbox">
                    <?php
                        if(isset($_GET['error'])) { ?>
                            <p class="error">*<?php echo $_GET['error'];?></p>
                        <?php } 
                        else if(isset($_GET['success'])) { ?>
                            <p class="success">*<?php echo $_GET['success'];?></p>
                        <?php } ?>
                    1. Do not <b>leave</b> or <b>refresh</b> the page while writing the EXAM. <br>
                    2. You cannot <b>Logout</b> once you start the exam. <br>
                    3. You cannot <b>clear</b> the option once selected. <br>
                    4. Press <b>Submit</b> button to submit the Exam. <br>
                    5. <b style="color:rgb(0, 112, 0)">+5</b> points for <b class="bold">Correct</b> answer. <br>
                    6. <b style="color:red">-1</b> points for <b class="bold">Incorrect</b> answer. <br>
                    7. <b>+0</b> points if not answered. <br>
                    8. Initially if you are <b>newly registered student</b> you will be graded <b>10</b>. <br> 
                    9. <b>Grade</b> will be updated every time you submit the exam based on the final score. <br>
                    10. Press <b>START</b> button to start the exam. <br>

                    <button class="startbutton" type="submit">START</button>
            </form>
        </div>
    </body>
    </html>

    <?php
}
else {
   header("Location:sindex.php?error=unable to reload please try again!");
   exit();
}

?>