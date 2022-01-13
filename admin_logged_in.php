<?php
session_start();

$connection = new mysqli('localhost','root','','srms');

if(isset($_POST['is_set'])){
    $roll =  $_POST['rno'];
    $gui = $_POST['gui'];
    $os = $_POST['os'];
    $stats = $_POST['stats'];
    $query = mysqli_query($connection,"INSERT into result(roll_no,gui,os,stats) VALUES ('$roll','$gui','$os','$stats')");
    if($query){
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Admin Panel</title>
</head>
<body>
<h1>Welcome, Admin</h1><br>
        <h2>Enter Marks</h2>
    <div class="main">
        <form action="" method="post">
                <input type="text" name="rno" placeholder=" &nbsp; &nbsp; Roll No" class="rn">
                <input type="text" name="gui" id="" placeholder=" &nbsp; &nbsp;GUI">
                <input type="text" name="os" id="" placeholder=" &nbsp; &nbsp;OS">
                <input type="text" name="stats" id="" placeholder=" &nbsp; &nbsp;stats">
                <input type="submit" name="is_set" value="Submit" class="sub">
        </form>
    </div>
</body>
</html>