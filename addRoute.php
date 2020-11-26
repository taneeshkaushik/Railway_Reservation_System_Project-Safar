<?php
//include auth.php file on all secure pages
include("admin_auth.php");
require('db1.php');

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
      <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['admin']; ?></a> </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>
<?php 

if(isset($_REQUEST["submit"])){



  $train_num =  $_REQUEST['train_no'];
  // echo $train_num;
  
  $q="insert into `trains`(`id`) values('$train_num');";
  $res1 = mysqli_query($con1 , $q);
  
  if($res1){
  $q1 ="create table `".$train_num."_stations`
  (
      
      station_id int  not null, 
      arrival_time time not null, 
      departure_time time , 
      primary key(station_id , arrival_time , departure_time),
      foreign key(station_id) references stations(id)
  
  );";
  $res2 = mysqli_query($con1 , $q1);
  
  }

 $stationName = $_REQUEST['name'];
 $stationId = $_REQUEST['stationid'];
 $arr =$_REQUEST['arrival'];
 $dep = $_REQUEST['dept'];

 for ($x =0 ; $x < count($stationId) ; $x++ ){
  $query = "select * from `stations` where id = '$stationId[$x]';";
  $r  = mysqli_query($con1 , $query);
  if(mysqli_num_rows($r) == 0)
  {
    $query1 = "INSERT into `stations` (`id` , `name`) values ('$stationId[$x]' , '$stationName[$x]');";
    $r1 = mysqli_query($con1 , $query1);
    $query2 = "CREATE table `".$stationId[$x]."_trains`
    (
        train_id int not null, 
        arrival_time time not null, 
        departure_time time,
        primary key(train_id, arrival_time), 
        foreign key(train_id) references trains(id)
    
    );";
    // echo $query2;
    $r2 = mysqli_query($con1 , $query2);
   

  }

  $query3 = "INSERT into `".$stationId[$x]."_trains` (`train_id`, `arrival_time`, `departure_time`)  values ('$train_num', '$arr[$x]' , '$dep[$x]');";
  $r3= mysqli_query($con1,$query3);

  
  $query4 = "INSERT into `".$train_num."_stations` (`station_id` , `arrival_time` , `departure_time`)  values ('$stationId[$x]' , '$arr[$x]' ,'$dep[$x]');";
 $r4 = mysqli_query($con1 , $query4);


 }

 echo '<script>alert("Operation Successful!!!"); history.go(-1);</script>'; 


}
else{
?>
<div class="container well">
<h2 class="text-center"> Assign Routes </h2>
<hr>
<form  class="form-horizontal">

<div class="form-group row">
  <div class="col-sm-2">
  <label >Enter Train Number:</label>
  </div>
  <div class="col-sm-10"> 
  <input type="text" class="form-control " placeholder="enter train number" name="train_no"  required="true">  </div>
</div>
    <div id ="station-form">
     <div class="form-group row">
           <div class="col-sm-3"> <label> Station Id </label><input  class="form-control" type="text" name="stationid[]" placeholder="Station Id" required="True"  >  </div>
           <div class="col-sm-3 " >
             <label> Station Name </label>
             <input  class="form-control" type="text" name="name[]"  placeholder="Station name" required="True">
           </div>       
           <div class="col-sm-3">
             <label>Arrival Time</label>
             <input  class="form-control" type="time" name="arrival[]"  placeholder="Arrival time" required="True">
           </div>       
           <div class="col-sm-3">
             <label >Departure Time</label>
             <input  class="form-control" type="time" name="dept[]"  placeholder="Departure time" required="True">
           </div>


    
    </div>
    

    </div>

          <div class="form-group row" >
        
          <a onclick="addStation()">+Add Station</a>
        
          </div> 


   <button type="submit" name="submit" class="btn btn-success pull-right" > Submit </input>

      
    </form> 

</div>


<script>

var c = 1;

        function addStation(){
          c++;
      a=  '<div class="form-group row">'
      z =' <div class="col-sm-3"> <label> Station Id </label><input  class="form-control" type="text" name="stationid[]" required="True" placeholder="Station Id" >  </div>'

       b=    '<div class="col-sm-3 " >'
        c1=     '<label> Station Name </label>'
         d=    '<input  class="form-control" type="text" name="name[]"  placeholder="Station name" required="True">'
         e=  '</div>'       
         f=  '<div class="col-sm-3">'
          g=   '<label>Arrival Time</label>'
          h=   '<input  class="form-control" type="time" name="arrival[]"  placeholder="Arrival time" required="True">'
          i= '</div>'       
          j= '<div class="col-sm-3">'
          k=   '<label >Departure Time</label>'
          l=   '<input  class="form-control" type="time" name="dept[]"  placeholder="Aeparture time" required="True">'
          m= '</div>'
        n ='</div>'

        document.getElementById("station-form").innerHTML +=  a+z+b+c1+d+e+f+g+h+i+j+k+l+m+n;

        }

</script>

<?php } ?>
</body>
</html>



