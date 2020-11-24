<?php 
//include auth.php file on all secure pages
include("auth.php");

// echo $_SESSION["train_id"];
// echo $_SESSION["date"];
// echo $_SESSION["num_ac"];echo $_SESSION["num_sl"];

if(isset($_REQUEST["submit"])){

$_SESSION["seats"] = $_REQUEST["seats"];

header("Location:add_seats.php");

}

else{



  require('db.php');

$query = "select * from `".$_SESSION["train_id"]."_".$_SESSION["date"]."_booked`;";
$result = mysqli_query($con , $query);

$disable = array_fill(1, 1+ $_SESSION["num_sl"]*24 +$_SESSION["num_ac"]* 18 , '');
// $disable[192] = 'disabled';
if(mysqli_num_rows($result) > 0 ){
while($row = mysqli_fetch_assoc($result)){      
  $coach = $row["coach_num"];
  $seat  = $row["seat_num"];
  if($coach <= $_SESSION["num_sl"]){
    $index = ($coach-1) * 24 + $seat;}
  else{
    $index = $_SESSION["num_sl"] * 24 + ($coach - $_SESSION["num_sl"] -1 ) * 18 + $seat;
  }

  $disable[$index] = 'disabled';
  
}
}


?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Railway</title>


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
   div label input {
   margin-right:100px;
}
body {
    font-family:sans-serif;
}

#ck-button {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;
    float:left;
}

#ck-button {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid #D0D0D0;
    overflow:auto;
    float:left;
}

#ck-button:hover {
    margin:4px;
    background-color:#EFEFEF;
    border-radius:4px;
    border:1px solid green;
    overflow:auto;
    float:left;
    color:green;
}

#ck-button label {
    float:left;
    width:4.0em;
}

#ck-button label span {
    text-align:center;
    padding:3px 0px;
    display:block;
}

#ck-button label input {
    position:absolute;
    top:-20px;
}

#ck-button input:checked + span {
    background-color:blue;
    color:#fff;
}

#ck-button input[disabled] + span{

  background-color:#911;
    color:#fff;}
  </style>


</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">RailWay</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Check PNR</a></li>

      <li><a href="#">Your Bookings</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['userid']; ?></a> </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>

<header >
 <h2 class="text-center">
 Select Seats for Booking. Red Seats are booked and Green seats are Available
 </h2>
</header>

<div>
<?php

// if(isset($_POST["submit"])){
//   // header("Location:add_seats.php");
//    $seats = $_REQUEST['seats'];
//    foreach ($seats as $v){
//         echo $v."*";      
//        }
// }
// else{  
  // header("Location:add_seats.php");
?>

<form method="post" action="">
<div class="container well ">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    

    <!-- Wrapper for slides -->
<div class="carousel-inner">

    <div class="item active ">
    
    <div class="container">
       <!-- <input type="hidden" name=> </input> -->
        <div class="row" style="margin-left: 360px;">
            <div id="ck-button"><label> <input <?php echo $disable[1]; ?> name ="seats[]" type="checkbox" value="1_1" ><span>1 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[4]; ?> name ="seats[]" type="checkbox" value="1_4"><span>4 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[9]; ?> name ="seats[]" type="checkbox" value="1_9"><span>9 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[12]; ?> name ="seats[]" type="checkbox" value="1_12"><span>12 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[17]; ?> name ="seats[]" type="checkbox" value="1_17"><span>17 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[20]; ?> name ="seats[]" type="checkbox" value="1_20"><span>20 LB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input <?php echo $disable[2]; ?> name ="seats[]" type="checkbox" value="1_2"><span>2 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[5]; ?> name ="seats[]" type="checkbox" value="1_5"><span>5 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[10]; ?> name ="seats[]" type="checkbox" value="1_10"><span>10 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[13]; ?> name ="seats[]" type="checkbox" value="1_13"><span>13 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[18]; ?> name ="seats[]" type="checkbox" value="1_18"><span>18 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[21]; ?> name ="seats[]" type="checkbox" value="1_21"><span>21 MB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input <?php echo $disable[3]; ?> name ="seats[]" type="checkbox" value="1_3"><span>3 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[6]; ?> name ="seats[]" type="checkbox" value="1_6"><span>6 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[11]; ?> name ="seats[]" type="checkbox" value="1_11"><span>11 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[14]; ?> name ="seats[]" type="checkbox" value="1_14"><span>14 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[19]; ?> name ="seats[]" type="checkbox" value="1_19"><span>19 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[22]; ?> name ="seats[]" type="checkbox" value="1_22"><span>22 UB</span></label></div>

        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input <?php echo $disable[7]; ?> name ="seats[]" type="checkbox" value="1_7"><span>7 SL</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[8]; ?> name ="seats[]" type="checkbox" value="1_8"><span>8 SU</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[15]; ?> name ="seats[]" type="checkbox" value="1_15"><span>15 SL</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[16]; ?> name ="seats[]" type="checkbox" value="1_16"><span>16 SU</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[23]; ?> name ="seats[]" type="checkbox" value="1_23"><span>23 SL</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[24]; ?> name ="seats[]" type="checkbox" value="1_24"><span>24 SU</span></label></div>
        </div>

        <div class="row text-center ">
          <h3>SL1</h3>
        </div>
       </div>
    </div>

  <?php 
  $x = 1;
  while( $x < $_SESSION['num_sl']  ) { ?>

    <div class="item  ">
       <div class="container">
        <div class="row" style="margin-left: 360px;">
            <div id="ck-button"><label> <input <?php echo $disable[$x*24+ 1]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_1"><span>1 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$x*24+4]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_4"><span>4 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$x*24+9]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_9"><span>9 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$x*24+12]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_12"><span>12 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$x*24+17]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_17"><span>17 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$x*24+20]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_20"><span>20 LB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+2]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_2"><span>2 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+5]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_5"><span>5 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+10]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_10"><span>10 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+13]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_13"><span>13 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_18"><span>18 MB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+21]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_21"><span>21 MB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+3]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_3"><span>3 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+6]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_6"><span>6 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+11]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_11"><span>11 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+14]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_14"><span>14 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+19]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_19"><span>19 UB</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+22]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_22"><span>22 UB</span></label></div>

        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+7]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_7"><span>7 SL</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+8]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_8"><span>8 SU</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+15]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_15"><span>15 SL</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+16]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_16"><span>16 SU</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+23]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_23"><span>23 SL</span></label></div>
           <div id="ck-button"><label> <input <?php echo $disable[$x*24+24]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1; ?>_24"><span>24 SU</span></label></div>
        </div>
        <div class="row text-center ">
          <h3>SL<?php echo $x+1;  ?></h3>
        </div>
    </div>
    </div>
    
      <?php
    $x = $x+1 ;
    } ?>

  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>


  </div>
</div>


<div class="container well">

<div id="myCarousel1" class="carousel slide" data-ride="carousel">
    

    <!-- Wrapper for slides -->
<div class="carousel-inner">

    <div class="item active ">
    
    <div class="container">
        <div class="row" style="margin-left: 360px;">
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 1]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_1"><span>1 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 2]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_2"><span>2 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 7]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_7"><span>7 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 +8 ]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_8"><span>8 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 13]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_13"><span>13 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 14]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_14"><span>14 LB</span></label></div>

        </div>
        <div class="row" style="margin-left: 360px;">


            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 3]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_3"><span>3 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 4]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_4"><span>4 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 9]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_9"><span>9 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 10]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_10"><span>10 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 15]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_15"><span>15 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 16]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_16"><span>16 UB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
   
            
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 5]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_5"><span>5 SU</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 6]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_6"><span>6 SL</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 11]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_11"><span>11 SU</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 12]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_12"><span>12 SL</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 17]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_17"><span>17 SU</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 18]; ?> name ="seats[]" type="checkbox" value="<?php echo $_SESSION["num_sl"]+1; ?>_18"><span>18 SL</span></label></div>

        </div>
       </div>
       <div class="row text-center ">
          <h3>AC1</h3>
        </div>
    </div>

  <?php 
  $x = 1;
  while( $x < $_SESSION['num_ac']  ) { ?>

    <div class="item  ">
       <div class="container">
       <div class="row" style="margin-left: 360px;">

            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 1 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_1"><span>1 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 2 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_2"><span>2 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 7 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_7"><span>7 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 8  +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_8"><span>8 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 13 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_13"><span>13 LB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 14 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_14"><span>14 LB</span></label></div>

        </div>
        <div class="row" style="margin-left: 360px;">


            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 3 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_3"><span>3 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 4 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_4"><span>4 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 9 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_9"><span>9 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 10 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_10"><span>10 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 15 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_15"><span>15 UB</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 16 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_16"><span>16 UB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
   
            
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 5 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_5"><span>5 SU</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 6 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_6"><span>6 SL</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 11 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_11"><span>11 SU</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 12 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_12"><span>12 SL</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 17 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_17"><span>17 SU</span></label></div>
            <div id="ck-button"><label> <input <?php echo $disable[$_SESSION["num_sl"]* 24 + 18 +$x*18]; ?> name ="seats[]" type="checkbox" value="<?php echo $x+1 + $_SESSION["num_sl"]; ?>_18"><span>18 SL</span></label></div>

        </div>
        </div>
        <div class="row text-center ">
          <h3 >AC<?php echo $x+1 ;  ?></h3>
        </div>
    </div>

    
      <?php
    $x = $x+1 ;
    } ?>

  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>


  </div>
</div>
<div class="container text-center">
<button type="submit" name="submit" class="btn btn-primary"> Book Tickets </button>
<div>
</form>

<?php } ?>
<div>


</body>
</html>