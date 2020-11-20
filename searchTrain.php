<?php
//include auth.php file on all secure pages
include("auth.php");
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
  Welcome to Search Portal
 </h2>
</header>


<div class="container well"> 
     <form>
     <h2 class="text-center">
Search for Trains     </h2>
     <hr>
    <div class="form-group">
    <label  class="col-form-label"> Starting Station:</label>
      <input type="text" class="form-control" id="source" placeholder="From*" required="true">
    </div>
    
    <div class="form-group">
    <label  class="col-form-label">End Station:</label>
      <input type="text" class="form-control" id="dest" placeholder="To*" required="true">
    </div>

  <div class="form-group">
  <label  class="col-form-label">Choose date of Travel:</label>
    <input type="date" class="form-control" id="traveldate" required="true" >
  </div>

  <button type="submit" class="btn btn-primary"> Find Trains</button>
</form>
</div>


</body>
</html>