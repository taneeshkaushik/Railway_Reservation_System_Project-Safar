<?php
//include auth.php file on all secure pages
include("auth.php");
include("db.php");
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


   <table class="table">

   <tr>
     <th class="text-center"> Passenger Name </th>

     <th class="text-center">Aadhar </th>
     <th  class="text-center">Age </th>
     <th  class="text-center">Gender </th>
     <th  class="text-center">Coach Num </th>
     <th  class="text-center">Seat Num </th>
     
   </tr>


   <?php

  // $q = "select * from `trains_running` where train_id = {$_SESSION["train"]};";
  // $r = mysqli_query($con , $q);
  
  // $index  = mysqli_fetch_assoc($r)
  // $num_sl = $index["num_sl"];  


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
            // echo $in["name"] ."--- ". $in["aadhar"]. " --- " . $in["age"] ."---".  $in["sex"] ."---" .$row["coach_num"]." --- ".$row["seat_num"];

            ?>
          <tr>
            <td class="text-center"> <?php echo $in["name"]; ?> </td>
            <td  class="text-center"><?php echo $in["aadhar"]; ?> </td>
            <td  class="text-center"><?php echo $in["age"]; ?> </td>
            <td  class="text-center"><?php echo $in["sex"]; ?> </td>
            <td  class="text-center"><?php echo $row["coach_num"]; ?> </td>
            <td class="text-center"><?php echo $row["seat_num"]; ?> </td>
          </tr>
     <?php
          
        }


      }

    }

   ?>

</table>

</div>
