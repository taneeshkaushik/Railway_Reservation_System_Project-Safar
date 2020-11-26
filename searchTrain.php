<?php
//include auth.php file on all secure pages
include("auth.php");
include("db1.php");
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
      <!-- <li class="active"><a href="#">Check PNR</a></li> -->

      <li><a href="booking_history.php">Your Bookings</a></li>
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

<?php 
if(isset($_REQUEST['submit']))
{
$start_station = $_REQUEST['source'];
$dest_station = $_REQUEST['dest'];
$date = $_REQUEST['traveldate'];

// echo $start_station . $dest_station .$date;


$q="select * from `".$start_station."_trains`";
$result=mysqli($con,$q);

if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){
   $q =  "select "

  }

}

for each $t of result,
    $q= "select station_id from $t_stations where station_id==$b"
    $res=mysqli($con, $q);
    if(sizeof($res)!=0)
        ans.add(train,arrival-time, departure time, arrival time at b, departure at b)
        continue;

    else

        $q="select  from $t_stations "
        $res=mysqli($con, $q)
        sort($res)
        for each station $s in $res
            
            $q=select * from $s_trains
            $res=mysqli($con, $q);
            




}
else{
?>


<div class="container well"> 
     <form>
     <h2 class="text-center">
Search for Trains     </h2>
     <hr>
    <div class="form-group">
    <label  class="col-form-label"> Starting Station:</label>
      <input type="text" class="form-control" name="source" placeholder="From*" required="true">
    </div>
    
    <div class="form-group">
    <label  class="col-form-label">End Station:</label>
      <input type="text" class="form-control" name="dest" placeholder="To*" required="true">
    </div>

  <div class="form-group">
  <label  class="col-form-label">Choose date of Travel:</label>
    <input type="date" class="form-control" name="traveldate" required="true" >
  </div>

  <button type="submit" name = "submit" class="btn btn-primary"> Find Trains</button>
</form>
</div>

<?php } ?>
</body>
</html>