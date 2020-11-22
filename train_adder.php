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
      <a class="navbar-brand" >Welcome to the Admin Portal</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['userid']; ?></a> </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>

<div class="container">
<h2  >YOU CAN ADD TRAINS AVAILABLE TO SYSTEM HERE</h2>

<div class="well text-center">
    <h3>Please add the special key for being able to add trains into system.

    <form action="key_checking.php" method="post">
    High Security Key <input type="text" name="key"><br>
    <hr>
    <input type="submit">
    </form>
  </div>
  
  <div class="well text-center">
    <div class="btn-group-vertical" style="width:400px">
      <button type="button" class="btn btn-lg btn-primary" >ADD TRAIN</button>
      <br>
      <button type="button" class="btn btn-lg btn-primary">REMOVE TRAIN</button>
      <br>
    </div>
  </div>

</div>

</body>
</html>