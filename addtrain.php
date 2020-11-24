<?php
//include auth.php file on all secure pages
include("auth.php");
require('db.php');
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

<?php

if(isset($_REQUEST["train_no"])){
    $userid = $_SESSION['userid'];
    $train_no = $_REQUEST['train_no'];
    // echo $train_no;
    $query = "INSERT INTO `trains` (`train_id`) VALUES ('$train_no');";
    $query1 = "INSERT INTO `".$userid."_trains` (`train_id`) VALUES ('$train_no');";

    $result = mysqli_query($con , $query);
    $result1 = mysqli_query($con , $query1);
    
    if($result and $result1)
    {
     // echo '<script>alert("Train Inserted Successfully"); history.go(-1);</script>'; 

        header("Location: admin.php");
    }

}
else{
?>

<div class="container">
<h2 class="text-center" >YOU CAN ADD TRAINS WHICH WILL BE AVAILABLE TO SYSTEM HERE</h2>

<div class="well">

<form action="" method="post">

  <div class="form-group">
  <label>Enter Train Number:</label>
  <input type="text" class="form-control" name="train_no"  required="true">
  </div>

    <input class="btn btn-primary" type="submit"> </input>
    </form>
  </div>
  


</div>
<?php } ?>
</body>
</html>