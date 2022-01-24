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
        <title>Result</title>
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
                    <li><a href="tests.php">Tests</a></li>
                    <li><a href="examlist.php">History</a></li>
                    <li class="logout"><a href="/ExaminationSystem/student/login/slogout.php">Logout</a></li>
                </ul>
            </span>
        </div>
        <div class="exambox">
            <form action="submit.php" method="post" autocomplete="off">
                <?php $test = $_SESSION['tname']; ?>
                <h2 class="head">Result of <?php echo $test ?></h2>
                <div class="questionbox1">
                    <?php
                        if(isset($_GET['error'])) { ?>
                            <p class="error">*<?php echo $_GET['error'];?></p>
                        <?php } 
                        else if(isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success'];?></p>
                        <?php } 
                        else if(isset($_GET['details'])) { ?>
                            <p class="details"><?php echo $_GET['details'];?></p>
                        <?php } ?>
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