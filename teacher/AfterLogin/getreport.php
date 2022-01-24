<?php
session_start();

include "question_db.php";
include "sdb_conn.php";
include "testcheck_db.php";

$_SESSION['user'] = $_SESSION['user_name'];

$username = $_SESSION['user'];

$test = $_POST['test'];

$sql1 = "SELECT * FROM testchecker WHERE test_name='$test'";
$result1 = mysqli_query($conn2, $sql1);

if($test == 0) {
    header("Location:report.php?error=No test selected");
    exit();
}

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exam Report</title>
        <link rel="stylesheet" href="/ExaminationSystem/teststyle.css">
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
                    <li><a href="home1.php">Home</a></li>
                    <li><a href="report.php">Exam</a></li>
                    <li class="logout"><a href="/ExaminationSystem/teacher/login/tlogout.php">Logout</a></li>
                </ul>
            </span>
        </div>
        <div class="exams">
            <table>
                <tr>
                    <th bgcolor="#00ADB5">STUDENT NAME</th>
                    <th bgcolor="#00ADB5">DATE</th>
                    <th bgcolor="#00ADB5">TOTAL QUESTIONS</th>
                    <th bgcolor="#00ADB5">CORRECT</th>
                    <th bgcolor="#00ADB5">INCORRECT</th>
                    <th bgcolor="#00ADB5">SCORE</th>
                </tr>
                <?php 
                while($data2 = mysqli_fetch_array($result1)) { ?>
                    <tr>
                        <td bgcolor="#EEE"><?php echo $data2['stud_name'] ?></td>
                        <td bgcolor="#EEE"><?php echo $data2['d'] ?></td>
                        <td bgcolor="#EEE"><?php echo $data2['totalq'] ?></td>
                        <td bgcolor="#EEE"><?php echo $data2['correct'] ?></td>
                        <td bgcolor="#EEE"><?php echo $data2['incorrect'] ?></td>
                        <td bgcolor="#EEE"><?php echo $data2['score'] ?> / <?php echo $data2['total'] ?></td>
                    </tr>
               <?php } ?>
            </table>
        </div>
    </body>
    </html>

    <?php
}

?>
