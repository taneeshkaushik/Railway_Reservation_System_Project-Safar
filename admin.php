<?php
//include auth.php file on all secure pages
require('db.php');
include("admin_auth.php");

?>


<?php  
  // include ('db.php');

  if(isset($_REQUEST["submit"])){
  
  $q = "select * from `sensitive_info`";
  $run = mysqli_query($con , $q);
  $row = mysqli_fetch_assoc($run);

  // echo $_REQUEST["key"] . " " .$row['high_security_key'];
  
   if ($_REQUEST["key"] == $row['high_security_key'] ){
       header("Location:addtrain.php");
   }
   else{
      //  header("Location:admin.php");
           echo '<script>alert("Incorrect Key"); history.go(-1);</script>'; 
   }
  }

else {

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
    <ul class="nav navbar-nav">    
    <li><a href="history.php"> History </a></li>
    <li><a href="trainhistory.php">Train History </a></li>

    <li><a data-toggle="modal" data-target="#exampleModal"> Add Train </a></li>
    <li><a href="addRoute.php"> Add Train and Routes </a></li>

  
      <!-- <a class="navbar-brand" >Welcome to the Admin Portal</a> -->
    </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['admin']; ?></a> </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>



<div class="container">

  <div class="well text-center">

  <h2 >ADMIN PORTAL</h2> <br>  <h4> List of Available Trains </h4>
    <div class="btn-group-vertical" style="width:100%">
  
    
    <?php
      

       $query = "SELECT train_id FROM trains";
       $result = mysqli_query($con,$query) or die(mysql_error());
       
       if(mysqli_num_rows($result) >0) {
        ?>

        <table class="table ">
        <tr>
          <th class="text-center"> Train Number  </th>
          <th class="text-center"> Journey Date  </th>
          <th class="text-center"> Add Sleeper Coach </th>
          <th class="text-center"> Add AC Coach </th>
          <th class="text-center"> Release Train</th>
          
          <!-- <th class="text-center"> Add Route</th>      -->
        </tr>

       <?php

        while($row = mysqli_fetch_assoc($result)){      
          ?>
        <tr>
        <form action="" , method="POST">
         <td>
           <?php echo $row["train_id"];
           
           ?>
           <input type="hidden" required="True" name ="train_no" value = <?php echo $row["train_id"]; ?> >  </input>
         </td>
         <td><input type="date"   min="<?php  echo date("Y-m-d",strtotime("+2 month",strtotime(date("Y-m-01",strtotime("now") ) ))); ?>" required="True" name ="journey_date">  </input> </td>
         <td><input  type="number" min ="0" value="0" required="True" name ="num_sl"> </input> </td>
         <td><input type="number" value="0" min ="0" required="True" name ="num_ac"> </input> </td>
         <td><button class="btn btn-primary" type="submit" > Release </button>   </td>
         </form>
<!-- 
         <?php 

        
        //  if(isset($_REQUEST["addroute"])){
        //    $_SESSION['train_no'] = $_REQUEST['train'];
        //    header("Location:addRoute.php");
        //  }
        //  else{
         ?>
         <form method="post">
         <input type="hidden" required="True" name ="train" value = <?php // echo $row["train_id"]; ?> >  </input>
         <td><button class="btn btn-warning" type="submit" name="addroute" > Add </button>   </td>
         </form>
        <?php 
      // }
       ?> -->

        </tr>
         <?php

if (isset($_REQUEST['journey_date'])){

  $train_id = $_REQUEST['train_no'];

  $journey_date = $_REQUEST['journey_date'];
  $num_ac = $_REQUEST['num_ac'];

  $num_sl = $_REQUEST['num_sl'];
 // $train=strval($train_id);
  //$date=$journey_date->format('Y-m-d');

  // echo $train_id . $journey_date .$num_ac .$num_sl;
  $q = "select  * from `trains_running` where train_id = '$train_id' and journey_date = '$journey_date';";
  $r  = mysqli_query($con , $q);

  if(mysqli_num_rows($r) == 0 )
  {

  $query2 = "insert into `trains_running` (`train_id`, `journey_date`,`num_sl`,`num_ac`)
   values ('$train_id','$journey_date' , '$num_sl' , '$num_ac');";
  $query1 = "insert into `".$_SESSION['admin']."_trains_added` (`train_id`, `date_added`,`num_sl`,`num_ac`) 
  values ('$train_id','$journey_date' , '$num_sl' , '$num_ac');";
  
  $creating_ticket_table_for_each_train= "CREATE TABLE `".$train_id."_".$journey_date."_booked`
  (
    coach_num varchar(6) not null, 
    seat_num int not null,
    booker_username varchar(255) not null, 
    primary key(seat_num, coach_num),
    FOREIGN key(booker_username) references booker(username)
  );";

  $result1 = mysqli_query($con,$query2);
  $result2 = mysqli_query($con,$query1);
  $res3= mysqli_query($con, $creating_ticket_table_for_each_train);
  

  if($result1 and   $result2 and $res3 ){
      //  echo '<script>alert("Train added now available for booking."); history.go(-1);</script>'; 
  
  header("Location: admin.php");
  
  }

}

// else
// {
//   // header("Location:err.php");
//          echo '<script>alert("Train is already added."); history.go(-1);</script>'; 

// }


  // echo  $result1;
  // echo $result2;
 
}
        
      }

        ?>
        </table>
        <?php

       }
       else{
         ?>
       <h4> No train available </h4>
       
        <?php
       }
         


    ?>
    
    </div>


  </div>


</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


          <form action="" method="post">
           Enter High Security Key <input type="password" name="key"><br>
        <hr>
        <input name="submit" type="submit" class="btn btn-primary"> </input>
        </form>


      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


          <form action="" method="post">
           Enter High Security Key <input type="password" name="key"><br>
        <hr>
        <input name="submit" type="submit" class="btn btn-primary"> </input>
        </form>


      </div>

    </div>
  </div>
</div> -->


<?php } ?>



</body>


</html>