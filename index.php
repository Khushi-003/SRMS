<!DOCTYPE html>
<html lang="en">
<?php

if(!isset($_SESSION)) {         
  session_start(); 
} 
    
$connection = new mysqli('localhost','root','','srms');
if(isset($_POST['auth'])){
  $email =  $_POST['std_email']; 
  $password =  $_POST['std_password'];

  if($email != ""){
    $query =  mysqli_query($connection,"SELECT `email`,`password` FROM student ");
    $arrayM = mysqli_fetch_all($query);
  
    for($i=0;$i<sizeof($arrayM);$i++){
      // echo $arrayM[$i][0] ." ".$arrayM[$i][1]."<br/>";
      //echo $email ."<------> ".$arrayM[$i][0]."<br/>";
      if($email == $arrayM[$i][0]){
        $_SESSION["session_email"] = $email;
        if($password == $arrayM[$i][1]){
          header('Location:logged_in.php');
        }
      }
    }
  }
}

if(isset($_POST['auth_ad'])){
  $email =  $_POST['ad_email']; 
  $password =  $_POST['ad_password'];

  if($email != ""){
    $query =  mysqli_query($connection,"SELECT `email`,`password` FROM admin ");
    $arrayM = mysqli_fetch_all($query);
  
    for($i=0;$i<sizeof($arrayM);$i++){
      echo $arrayM[$i][0] ." ".$arrayM[$i][1]."<br/>";
      //echo $email ."<------> ".$arrayM[$i][0]."<br/>";
      if($email == $arrayM[$i][0]){
        if($password == $arrayM[$i][1]){
          header('Location:admin_logged_in.php');
        }
      }
    }
  }
}
?>
<head>
<style>
  <?php include "style.css" ?>
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=zz, initial-scale=1.0">
    <title>Main</title>
    
</head>
<body> 
  <div class="container">
      <div class="student"> 
        <h2>Student Sign-in</h2>
        <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="fname" class="form-label">Email of Student :</label>
                <input type="text" name="std_email" class="form-control" id="email">
                <br>
                <br>
                <label for="roll_no" class="form-label">Password :</label>
                <input type="text" name="std_password" class="form-control" id="password">
                <br/>
                <br>
                <button type="submit" name="auth" class="btn btn-primary">Submit</button><span class="or">or</span>
                <button type="button" name="f" class="btn btn-warning"><a href="./student.php">Register</a></button>  
              </div>
        </form>
      </div>

      <div class="admin">
        <h2>Admin Panel</h2>
        <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="fname" class="form-label">Username :</label>
                <input type="text" name="ad_email" class="form-control" id="f_name" required>
                <br>
                <br>
                <label for="roll_no" class="form-label">Password :</label>
                <input type="text" name="ad_password" class="form-control" id="roll_no" required>
                <br/>
                <br>
                <button type="submit" name="auth_ad" class="btn btn-primary">Submit</button>
                </div>
        </form>
  
      </div>
  </div>   
</body>
</html>