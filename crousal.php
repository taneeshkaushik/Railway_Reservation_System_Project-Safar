<?php 
//include auth.php file on all secure pages
include("auth.php");

// echo $_SESSION["train_id"];
// echo $_SESSION["date"];
// echo $_SESSION["num_ac"];echo $_SESSION["num_sl"];


// if(isset($_REQUEST["submit"])){
//    $seats = $_REQUEST['seats'];
//    foreach ($seats as $v){
//         echo $v;      
//        }
// }
// else{

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
    background-color:#911;
    color:#fff;
}
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
<form method="post">
<div class="container well ">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    

    <!-- Wrapper for slides -->
<div class="carousel-inner">

    <div class="item active ">
    
    <div class="container">
        <div class="row" style="margin-left: 360px;">
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="1"><span>1 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="4"><span>4 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="9"><span>9 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="12"><span>12 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="17"><span>17 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="20"><span>20 LB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="2"><span>2 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="5"><span>5 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="10"><span>10 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="13"><span>13 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="18"><span>18 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="21"><span>21 MB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="3"><span>3 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="6"><span>6 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="11"><span>11 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="14"><span>14 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="19"><span>19 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="22"><span>22 UB</span></label></div>

        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="7"><span>7 SL</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="8"><span>8 SU</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="15"><span>15 SL</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="16"><span>16 SU</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="23"><span>23 SL</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="24"><span>24 SU</span></label></div>
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
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="1"><span>1 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="4"><span>4 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="9"><span>9 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="12"><span>12 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="17"><span>17 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="20"><span>20 LB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="2"><span>2 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="5"><span>5 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="10"><span>10 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="13"><span>13 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="18"><span>18 MB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="21"><span>21 MB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="3"><span>3 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="6"><span>6 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="11"><span>11 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="14"><span>14 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="19"><span>19 UB</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="22"><span>22 UB</span></label></div>

        </div>
        <div class="row" style="margin-left: 360px;">
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="7"><span>7 SL</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="8"><span>8 SU</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="15"><span>15 SL</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="16"><span>16 SU</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="23"><span>23 SL</span></label></div>
           <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="24"><span>24 SU</span></label></div>
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
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="1"><span>1 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="2"><span>2 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="7"><span>7 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="8"><span>8 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="13"><span>13 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="14"><span>14 LB</span></label></div>

        </div>
        <div class="row" style="margin-left: 360px;">

            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="3"><span>3 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="4"><span>4 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="9"><span>9 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="10"><span>10 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="15"><span>15 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="16"><span>16 UB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
   
            
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="5"><span>5 SU</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="6"><span>6 SL</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="11"><span>11 SU</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="12"><span>12 SL</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="17"><span>17 SU</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="18"><span>18 SL</span></label></div>

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
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="1"><span>1 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="2"><span>2 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="7"><span>7 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="8"><span>8 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="13"><span>13 LB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="14"><span>14 LB</span></label></div>

        </div>
        <div class="row" style="margin-left: 360px;">

            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="3"><span>3 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="4"><span>4 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="9"><span>9 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="10"><span>10 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="15"><span>15 UB</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="16"><span>16 UB</span></label></div>
        </div>
        <div class="row" style="margin-left: 360px;">
   
            
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="5"><span>5 SU</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="6"><span>6 SL</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="11"><span>11 SU</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="12"><span>12 SL</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="17"><span>17 SU</span></label></div>
            <div id="ck-button"><label> <input name ="seats[]" type="checkbox" value="18"><span>18 SL</span></label></div>

        </div>
        </div>
        <div class="row text-center ">
          <h3 >AC<?php echo $x+1;  ?></h3>
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

<button type="submit" class="btn btn-primary"> Book Tickets </button>

</form>
<div>

</body>
</html>