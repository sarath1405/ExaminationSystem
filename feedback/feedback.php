<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="/style.css">
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
                <li><a href="/index.php">Home</a></li>
                <li><a href="/about.php">About</a></li>
                <li class="home"><a href="/feedback.php">Feedback</a></li>
                <li><a href="https://github.com/sarath1405/ExaminationSystem"><i class="fa fa-github"></i>  GitHub</a></li> 
            </ul>
        </span>
    </div>
    <div class="exambox">
        <form action="feedbacksubmit.php" method="post" autocomplete="off">
        <h2>Feedback</h2>
        <div class="questionbox">
            <?php
                if(isset($_GET['error'])) { ?>
                    <p class="error">*<?php echo $_GET['error'];?></p>
                <?php } 
                else if(isset($_GET['success'])) { ?>
                    <p class="success">*<?php echo $_GET['success'];?></p>
                <?php } ?>
            <div class="fname">
                <label for="fname"> Full name *</label><br>
                <input autocomplete="off" type="text" name="fname" placeholder="Enter your full name">
            </div>
            <div class="fname">
                <label for="fname">email</label><br>
                <input autocomplete="off" type="email" name="email" placeholder="Enter your email">
            </div>  
            <div class="rating">
                <label for="rating">How would you rate this <span>Online Examination? *</span></label><br>
                <div class="ratings">
                    <input type="radio" name="rating" value=1><span>1</span>
                    </input><input type="radio" name="rating" value=2><span>2</span>
                    </input>
                    </input><input type="radio" name="rating" value=3><span>3</span>
                    </input>
                    </input><input type="radio" name="rating" value=4><span>4</span>
                    </input>
                    </input><input type="radio" name="rating" value=5><span>5</span>
                    </input>
                </div>
            </div>    
            <div class="suggestions">
                <label for="suggestions">Any comments or suggestions</label>
                <div class="textarea">
                    <textarea name="suggestion" id="" cols="50" rows="5" placeholder="Enter your suggestions here.."></textarea>
                </div>
            </div>
        </div>
        <div class="feedb">
            <button class="fbutton" type="reset">Reset</button>
            <button class="fbutton" type="submit">Submit</button>
        </div>
        </form>
    </div>
                    