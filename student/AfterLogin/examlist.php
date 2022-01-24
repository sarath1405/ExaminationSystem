<?php
session_start();

include "question_db.php";
include "sdb_conn.php";
include "testcheck_db.php";

$_SESSION['user'] = $_SESSION['user_name'];

$sql = "SELECT * FROM students WHERE user_name = '$_SESSION[user_name]'";

$result = mysqli_query($conn1, $sql);

$data = $result->fetch_array();

$_SESSION['grade'] = $data['grade'];

$username = $_SESSION['user'];

$sql1 = "SELECT * FROM testchecker WHERE stud_name='$username'";
$result1 = mysqli_query($conn2, $sql1);

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History</title>
        <link rel="stylesheet" href="/teststyle.css">
    </head>
    <body>
        <div class="header">
            <span class="image">
                <img src="/images/logo.png" alt="logo">
            </span>
            <span class="title">Online Examination</span>
            <span>
                <ul class="nav">
                    <li class="welcome"><span>welcome,</span> <?php echo strtoupper($_SESSION['user_name']);?></li>
                    <li class="welcome"><span>Grade</span> <?php echo $_SESSION['grade'];?></li>
                    <li><a href="tests.php">Tests</a></li>
                    <li class="logout"><a href="/student/login/slogout.php">Logout</a></li>
                </ul>
            </span>
        </div>
        <div class="exams">
            <table>
                <tr>
                    <th bgcolor="#00ADB5">TEST NAME</th>
                    <th bgcolor="#00ADB5">DATE</th>
                    <th bgcolor="#00ADB5">TOTAL QUESTIONS</th>
                    <th bgcolor="#00ADB5">CORRECT</th>
                    <th bgcolor="#00ADB5">INCORRECT</th>
                    <th bgcolor="#00ADB5">SCORE</th>
                </tr>
                <?php 
                while($data2 = mysqli_fetch_array($result1)) { ?>
                    <tr>
                        <td bgcolor="#EEE"><?php echo $data2['test_name'] ?></td>
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
else {
   header("Location:sindex.php?error=unable to reload please try again!");
   exit();
}

?>