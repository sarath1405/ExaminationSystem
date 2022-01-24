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
        <title>EXAM</title>
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
                </ul>
            </span>
        </div>
        <div class="exambox">
            <form action="submit.php" method="post" autocomplete="off">
                <h2>Questions</h2>
                <div class="questionbox">
                    <?php
                        $test = $_SESSION['tname'];
                        if(isset($_GET['error'])) { ?>
                            <p class="error">*<?php echo $_GET['error'];?></p>
                        <?php } 
                        else if(isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success'];?></p>
                        <?php }

                        $sql = "SELECT * from $test";
                        $result = mysqli_query($conn, $sql);
                        $r = mysqli_num_rows($result);
                        if($r == 0) {
                           echo "*No questions found, please try again later!";
                        } 
                        $i = 1;
                        while($data = mysqli_fetch_array($result)) { ?>
                            <span class="question">
                                <?php 
                                    echo ($i);?>.
                                <?php
                                    echo $data['question']; ?>
                            </span>

                            <div class="option1">
                                <input type="radio" name="question<?php echo $i ?>" id="1" value=1>
                                <label for="1"><?php echo $data['option1'];?></label>
                            </div>
                            <div class="option2">
                                <input type="radio" name="question<?php echo ($data['id']+1) ?>" id="2" value=2>
                                <label for="2"><?php echo $data['option2'];?></label>
                            </div>
                            <div class="option3">
                                <input type="radio" name="question<?php echo ($data['id']+1) ?>" id="3" value=3>
                                <label for="3"><?php echo $data['option3'];?></label>
                            </div>
                            <div class="option4">
                                <input type="radio" name="question<?php echo ($data['id']+1) ?>" id="4" value=4>
                                <label for="4"><?php echo $data['option4'];?></label>
                            </div>
                            <?php $i++ ?>
                        <?php } ?>
                </div>
                <button class="submitform" type="submit">Submit</button>
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