<?php 

include "feedback_db.php";

$fname = $_POST['fname'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$suggestion = $_POST['suggestion'];

if(empty($fname)) {
    header("Location:feedback.php?error=Full name is Required!");
    exit();
}
else if(empty($rating)) {
    header("Location:feedback.php?error=Some rating is Required!");
    exit();
}

$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);
$c = mysqli_num_rows($result);

$sql = "INSERT INTO feedback (id, name, email, rating, suggestion) VALUES ($c, '$fname', '$email', $rating, '$suggestion')";

if($conn->query($sql) == TRUE) {
    header("Location:feedback.php?success=Thank you for your Valuable Feedback !");
    exit();
}
else {
    header("Location:feedback.php?error=DataBase is not Responding!");
    exit();
}
