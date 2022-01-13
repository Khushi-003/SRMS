<?php 
session_start(); 
$connection = new mysqli('localhost','root','','srms');
$query =  mysqli_query($connection,"SELECT * FROM student ");
//echo $_SESSION["session_email"];
$arrayM = mysqli_fetch_all($query);
$my = [];
for($i=0;$i<sizeof($arrayM);$i++){
    if( $_SESSION["session_email"] == $arrayM[$i][3]){
        $my=$arrayM[$i];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stud.css">
    <title>Hey Student</title>
    
</head>
<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="container">
    <div class="detail">
    <?php 
    $name = "Name : " .$my[1];
    $image = $my[2];
    $email = "Email: ".$my[3];
    $class = "Class :".$my[6];
    $divi = "Div :".$my[5];
    $roll= "Roll :".$my[7];
    // echo "<h1>  $f_name </h1><h2>$r_number</h2>";
    // echo '<img src='.$file_path.'></img>';
    $style = "width:18rem;margin:20px;";
    $card = "card";
    $cardimg = "card-img-top";
    $cardbody = "card-body";
    $cardtitle = "card-title";
    $cardtext = "card-text";
    echo "<div class=".$card." style=$style >
        <img src=".$image." class=".$cardimg.">
        <div class=".$cardbody.">
        <h5 class=".$cardtitle.">$name</h5>
        <p class=".$cardtext.">$email</p>
        <p class=".$cardtext.">$roll</p>
        <p class=".$cardtext.">$class</p>
        <p class=".$cardtext.">$divi</p>
        </div>
    </div>
    </br>
    ";
?>
        </div><br>
        <div class="marks">
            <h1>MARKS : </h1>
            <?php 
            
            $queryMark =  mysqli_query($connection,"SELECT * FROM result ");
            $arrayMark = mysqli_fetch_all($queryMark);
            
            $myMarks = [];
            for($i=0;$i<sizeof($arrayMark);$i++){
                if($my[7] == $arrayMark[$i][1]){
                    $myMarks=$arrayMark[$i];
                }
            }
            $gui = "GUI :  ".$myMarks[2];
            $os = "OS :  ".$myMarks[3];
            $stats= "Stats:  ".$myMarks[4];
            $percent = $myMarks[2] + $myMarks[3] + $myMarks[4] / 300*100;
            echo "<div class=".$card." style=$style>
            
        <div class=".$cardbody.">
        <p class=".$cardtitle.">$gui</h5>
        <p class=".$cardtitle.">$os</p>
        <p class=".$cardtitle.">$stats</p>
        <p class=".$cardtitle.">Percentage:  $percent</p>
        </div>
        </div>
        </br>
    ";
?>
        </div>
    </div>
</body>
</html>