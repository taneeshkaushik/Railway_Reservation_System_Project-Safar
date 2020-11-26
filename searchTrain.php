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
  ?>
  <table class="table ">
  <tr>
    <th class="text-center"> Train Number  </th>
    <th class="text-center"> Source Station  </th>
    <th class="text-center"> Dept Source </th>
    <th class="text-center"> Intermediate Station </th>
    <th class="text-center">Arrival Inter </th>
    <th class="text-center">Dept Inter </th>
    
    <th class="text-center"> Destination Station </th>
    <th class="text-center">Arrival Dest </th>
    
<?php

  $start_station = $_REQUEST['source'];
  $dest_station = $_REQUEST['dest'];
// $date = $_REQUEST['traveldate'];

// echo $start_station . $dest_station .$date;

  $q = "select * from `".$start_station."_trains`";
  $start_trains = mysqli_query($con1,$q);
  
  if(mysqli_num_rows($start_trains)>0)
  {
    
    while($row = mysqli_fetch_assoc($start_trains))
    {
      
        $train_id = $row['train_id'];
        $dept_time = $row['departure_time'];
        $q =   "SELECT * from `".$train_id."_stations` where station_id = $dest_station and arrival_time > '$dept_time';";
        $res = mysqli_query($con1 , $q);
        
        if(mysqli_num_rows( $res) >  0)
        {
          
            /// get arrival time and start station   
            while($inrow = mysqli_fetch_assoc($res))
            {
              // echo " Train No" .$train_id .": Source Station=> ".$start_station." Departure time: ". $dept_time  ."--- Dest Station=> ".$inrow['station_id'] ." " . $inrow['arrival_time']; 
            ?>
            
            <tr>
               <td class="text-center"><?php echo $train_id    ?> </td>
               <td class="text-center"><?php echo $start_station    ?> </td>
               <td class="text-center"><?php echo $dept_time    ?> </td>
               <td class="text-center">  -- </td>
               <td class="text-center">  -- </td>
               <td class="text-center">  -- </td>

               <td class="text-center"><?php echo $inrow['station_id']    ?>   </td>
               <td class="text-center"><?php echo $inrow['arrival_time']    ?> </td>
            </tr>
            <?php
            

            }
      
        }

      else
      {
        $q1 = "select * from `".$train_id."_stations`;";
        $get_all_stations = mysqli_query($con1, $q1);
        
        if(mysqli_num_rows($get_all_stations) > 0 )
        {
            while($index = mysqli_fetch_assoc($get_all_stations))
            {
              
              $q2 = "select * from `".$index['station_id']."_trains`;";
              $trains=mysqli_query($con1, $q2);
              if(mysqli_num_rows($trains) > 0 )
              {
                while($j = mysqli_fetch_assoc($trains))
                {
                        $t =  $j['train_id'];
                        $q3 = "SELECT * from `".$t."_stations` where station_id = $dest_station and arrival_time > '{$j['departure_time']}';"; 
                        $result11 = mysqli_query($con1 , $q3);

                        if(mysqli_num_rows($result11) != 0)
                        {
                          /// get arrival time and start station
                          while($i = mysqli_fetch_assoc($result11)) {
                          // echo "Train No ".$train_id.  "Source Station" .$start_station. "Dept Time from Source" .$dept_time. "Intermediate Station" .$t. "Arrival" .$i['arrival_time']. "Dept"  .$i['departure_time']. "Destination Station" .$dest_station. "arrival time". $i['arrival_time'] ;
                          ?>
            
                          <tr>
                            <td class="text-center"><?php echo $train_id ;   ?> </td>
                            <td class="text-center"><?php echo $start_station;    ?> </td>
                            <td class="text-center"><?php echo $dept_time;    ?> </td>
                            <td class="text-center"><?php echo $i['station_id'];    ?>  </td>
                            <td class="text-center"><?php echo $j['arrival_time'] ;  ?> </td>
                            <td class="text-center"><?php echo $j['departure_time'] ;   ?> </td>

                            <td class="text-center"><?php echo $dest_station    ?>   </td>
                            <td class="text-center"><?php echo $i['arrival_time']    ?> </td>
                          </tr>
                          <?php
                        }


                        }
                }
              }

            }

            
        }

      }

  }

}

?>

</table>

<?php

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

  <!-- <div class="form-group">
  <label  class="col-form-label">Choose date of Travel:</label>
    <input type="date" class="form-control" name="traveldate" required="true" >
  </div> -->

  <button type="submit" name = "submit" class="btn btn-primary"> Find Trains</button>
</form>
</div>

<?php } ?>
</body>
</html>