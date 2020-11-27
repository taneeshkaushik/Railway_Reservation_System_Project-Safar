<?php
//include auth.php file on all secure pages
include("auth.php");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">RailWay</a>
    </div>
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Check PNR</a></li> -->

      <li><a href="booking_history.php">Your Bookings</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['userid']; ?></a> </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>

<div class="container well">
   <h2> PNR: 
  <?php echo $_SESSION["pnr"]; ?>
   </h2>
   <h2> Train No: 
  <?php echo $_SESSION["train"]; ?>
   </h2>
   <h2> Journey Date: 
  <?php echo $_SESSION["date"]; ?>
   </h2>

   <?php

// find details, 

// $pnr_given

// $booker, 
// select aadhar, coach_num, seat_num from booker_tic_pas where pnr=$pnr_given

// for each value fo 

//     select * from booker_passengers where aadhar = $aadhar
//      show, 


    $query = "select aadhar, coach_num , seat_num from `".$_SESSION['userid']."_tic_pas` where pnr =  {$_SESSION["pnr"]} ;";
    $result = mysqli_query($con , $query);
    if(mysqli_num_rows($result) >  0 )
    {
      while($row  = mysqli_fetch_assoc($result))
      {
        $aad  = $row["aadhar"];
        $query1 = "select * from `".$_SESSION['userid']."_passengers` where aadhar = $aad;";
        $res =  mysqli_query($con , $query1);
        if(mysqli_num_rows($res) >  0 )
        {
          $in  = mysqli_fetch_assoc($res);
            echo $in["name"] ."--- ". $in["aadhar"]. " --- " . $in["age"] ."---".  $in["sex"] ."---" .$row["coach_num"]." --- ".$row["seat_num"];
          
        }


      }

    }

   ?>



</div>
