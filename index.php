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
  Railway Registration System
 </h2>
</header>




<div class="container ">
     
     <h3 class="text-center"><a style ="width:200px " class="btn btn-primary" href="bookticket.php">   Book New Ticket </a></h3>

     
     <h3 class="text-center"><a style ="width:200px " class="btn btn-primary" href="searchTrain.php"> Search For Trains </a></h3>

<div>


</body>
</html>