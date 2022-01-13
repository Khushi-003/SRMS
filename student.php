<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $connection = new mysqli('localhost','root','','srms');
    if(isset($_POST['file_submit'])){
        $f_name =  $_POST['f_name'];
        $roll_no = $_POST['roll_no'];
        $class = $_POST['class'];
        $div = $_POST['div'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        if(($_FILES['upload_file']['name'] != '')){
            date_default_timezone_set('Asia/Kolkata');
            $current_date = date('dmYHis');
            $target_dir = "uploads/";
            $file = $_FILES['upload_file']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['upload_file']['tmp_name'];
            $file_name = $current_date.'.'.$ext;
            $path_file = $target_dir.$file_name;
            move_uploaded_file($temp_name,$path_file);
             //$roll_no = "roll_no";

        }
        $query = mysqli_query($connection,"INSERT into student(f_name, roll_no,image,class,division,email,password) VALUES ('$f_name','$roll_no','$path_file','$class','$div','$email','$password')");
        if($query){
            $_SESSION['uploaded'] = true;
            $_SESSION['f_name']= $f_name;
            $_SESSION['roll_no']= $roll_no;
            // $_SESSION['image']=
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg.css">
    <title>File Upload</title>
</head>
<body>

<div class="container">
        <div class="one">
        <h1>Student Register</h1>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="two">
                <label for="fname" class="form-label">Name of student:</label><br>
                <input type="text" name="f_name" class="form-control" id="f_name"><br>
                <label for="roll_no" class="form-label">Roll No:</label><br>
                <input type="text" name="roll_no" class="form-control" id="roll_no"><br>

                <label for="roll_no" class="form-label">Class:</label><br>
                <input type="text" name="class" class="form-control" id="roll_no"><br>

                <label for="roll_no" class="form-label">Div:</label><br>
                <input type="text" name="div" class="form-control" id="roll_no"><br>

                <label for="roll_no" class="form-label">Email:</label><br>
                <input type="text" name="email" class="form-control" id="roll_no"><br>

                <label for="roll_no" class="form-label">Password:</label><br>
                <input type="text" name="password" class="form-control" id="roll_no"><br>


                    <label for="formFile" class="form-label">File:</label><br>
                    <input class="form-control1" name="upload_file" type="file" id="formFile" accept="image/png"><br>
                    <button type="submit" name="file_submit" class="btn btn-primary">Submit</button>
                <button type="button" name="f" class="btn btn-warning"><a href="./index.php">Go back</a></button>
            </form>
                </div>
                
        </div>
        
    </div>
    
</body>
</html>