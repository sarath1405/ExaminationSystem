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
        <title>Add Questions</title>
        <link rel="stylesheet" href="/teacherlogin.css">
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
                    <li class="logout"><a href="/teacher/login/tlogout.php">Logout</a></li> 
                </ul>
            </span>
        </div>
        <div class="exambox">
            <form action="submit.php" method="post" autocomplete="off">
                <h2>Add Question to <?php echo $_SESSION['testname']; ?></h2>
                <div class="questionbox">
                <?php
                    if(isset($_GET['error'])) { ?>
                        <p class="error">*<?php echo $_GET['error'];?></p>
                    <?php } 
                    else if(isset($_GET['success'])) { ?>
                        <p class="success">*<?php echo $_GET['success'];?></p>
                    <?php } ?>
                    <div class="question">
                        <label for="question">Question</label><br>
                        <textarea class="textarea" name="question" id="question" cols="100" rows="5" placeholder="Enter your question here.."></textarea>
                    </div>
                    <div class="option1">
                        <label for="option1">Option 1</label><br>
                        <textarea class="textarea" name="option1" id="op1" cols="100" rows="2" placeholder="Enter your option 1.."></textarea>
                    </div>
                    <div class="option2">
                        <label for="option2">Option 2</label><br>
                        <textarea class="textarea" name="option2" id="op2" cols="100" rows="2" placeholder="Enter your option 2.."></textarea>
                    </div>
                    <div class="option3">
                        <label for="option3">Option 3</label><br>
                        <textarea class="textarea" name="option3" id="op3" cols="100" rows="2" placeholder="Enter your option 3.."></textarea>
                    </div>
                    <div class="option4">
                        <label for="option4">Option 4</label><br>
                        <textarea class="textarea" name="option4" id="op4" cols="100" rows="2" placeholder="Enter your option 4.."></textarea>
                    </div>
                    <div class="correct">
                        <label for="correct">Select correct option</label>
                        <select name="correct" id="c_option">
                            <option value=0>select</option>
                            <option value=1>option 1</option>
                            <option value=2>option 2</option>
                            <option value=3>option 3</option>
                            <option value=4>option 4</option>
                        </select>
                    </div>
                <button class="submitform" type="reset">Reset</button>
                </div>
                <button class="submitform" type="submit">Add question</button>
            </form>
        </div>
    </body>
    </html>

    <?php
}
else {
   header("Location:tindex.php?error=unable to reload please try again!");
   exit();
}

?>