
<?php
//include auth.php file on all secure pages
include("auth.php");
include("db.php");
// echo $_SESSION["num_ac"];echo $_SESSION["num_sl"];

  //  foreach ($_SESSION["seats"] as $v){
  //       echo $v."*";      
  //      }

if(isset($_REQUEST["submit"])){

  $query = "select last_pnr_used from `sensitive_info`;";
  $result = mysqli_query($con , $query);
  $r = mysqli_fetch_assoc($result);


  $pnr = $r["last_pnr_used"] + 1;
  // echo $pnr;
  // echo "dkkdkd";
  // $index  = $_REQUEST["pass"];
  $name = $_REQUEST["name"];
  $age = $_REQUEST["age"];
  $gender = $_REQUEST["gender"];
  $seats  = $_SESSION["seats"];
  $aadhar = $_REQUEST["aadhar"];
  $x = 0;
  // echo $seats[$x];
  $train_id = $_SESSION["train_id"];
  $journey_date = $_SESSION["date"];
  $username = $_SESSION['userid'];
  $q2 = "INSERT into `".$username."_ticket_table` (`pnr`,`train_id`,`ticket_date`) values ($pnr , $train_id , '$journey_date' ) ;";
  // echo $q2;
  $res2  = mysqli_query($con , $q2);

  while($x < count($name)){
    $st = explode("_", $seats[$x]);
    // echo $st[0]."**".$st[1];
    // echo $_SESSION['userid'];

  ///tables insertion queries begin here 
  $q1 = "INSERT INTO `".$train_id."_".$journey_date."_booked` (`coach_num` , `seat_num` ,`booker_username`) VALUES ($st[0] , $st[1] , '$username' ) ;";
  // echo $q1;
  $res1 = mysqli_query($con , $q1);
        

  $search_query = "SELECT * from `".$username."_passengers` where aadhar = $aadhar[$x]; ";
  // echo $search_query;
  $res = mysqli_query($con , $search_query);
  if(mysqli_num_rows($res) == 0){
      $q3 = "INSERT into `".$username."_passengers` (`aadhar` , `name` , `age` ,`sex`) values ('$aadhar[$x]' ,'$name[$x]' , '$age[$x]' ,'$gender[$x]' ) ;";
      $res3  = mysqli_query($con , $q3);
      // echo $q3;
    }

  $q4 = "INSERT into `".$username."_tic_pas` (`pnr` , `aadhar`) values($pnr , $aadhar[$x] ) ;" ;
  // // echo $q4;
  $res4 = mysqli_query($con, $q4);
  
  
 $x++;
  }

  
  $query2 = "update `sensitive_info` set last_pnr_used = '$pnr';";
  $result2 = mysqli_query($con,$query2);

  header("Location:crousal.php");

}
else{

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
            
            <label  class="col-form-label"> Aadhar No:</label>
            <input type="text" class="form-control" name="aadhar[]" required="true">

            <label for="recipient-name" class="col-form-label">Age:</label>
            <input type="text" class="form-control" name="age[]" required="true">

            <label for="" class="col-form-label"> Gender:</label>
            <div class="form-group-inline">
            <select name = "gender[]" class="browser-default custom-select ">
                <option selected>None</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Oth">Other</option>
            </select>             </div>       

            <label> Seat No:</label>
            <input type="text" class="form-control" name="seat[]"  value="<?php 
            $s = explode("_", $_SESSION["seats"][$x-1]);
             
            if($s[0] <= $_SESSION["num_sl"]){
              echo "SL".$s[0].", ".$s[1] ;
            }
            else{
              echo "AC".($s[0] - $_SESSION["num_sl"]).", ".$s[1];
            }
             
             
             ?>" disabled> </input> 
          </div >
        <?php } ?>
       <button class="btn btn-success pull-right" type ="submit" name ="submit"> Book ticket </button>
</form>


</div>



<?php } ?>

</body>
</html>