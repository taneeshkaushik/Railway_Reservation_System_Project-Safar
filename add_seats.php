
<?php
//include auth.php file on all secure pages
include("auth.php");
echo $_SESSION["train_id"];
echo $_SESSION["date"];
echo $_SESSION["num_ac"];echo $_SESSION["num_sl"];

   foreach ($_SESSION["seats"] as $v){
        echo $v."*";      
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

<div class="container well">
<form method="post" >
        <?php
        $x = 0 ;
        while($x < count($_SESSION["seats"])) {
            $x++;
        ?>
         
          <div id="booking-form" class="form-group">
            <h3 class="text-center"> Passenger <?php echo $x; ?> Details </h3>

            <label  class="col-form-label"> Name:</label>
            <input type="text" class="form-control" name="name[]" required="true">
            <label for="recipient-name" class="col-form-label">Age:</label>
            <input type="text" class="form-control" name="age[]" required="true">
            <label for="" class="col-form-label"> Gender:</label>
            <div class="form-group-inline">
            <select name = "gender[]" class="browser-default custom-select ">
                <option selected>None</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Oth">Other</option>
            </select> 
            </div>       
          </div >
        <?php } ?>
       <button class="btn btn-success pull-right" type ="submit" name ="submit"> Book ticket </button>
</form>


</div>





</body>
</html>