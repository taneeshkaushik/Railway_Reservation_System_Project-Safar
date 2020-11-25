<?php
//include auth.php file on all secure pages
include("admin_auth.php");
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
      <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['admin']; ?></a> </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>


<div class="container well">
<form  class="form-horizontal">
    <div id ="station-form">
     <div class="form-group row">
           <div class="col-sm-3"> <label> Station # </label><input  class="form-control" type="text" name="name[]" value="1" >  </div>
           <div class="col-sm-3 " >
             <label> Station Name </label>
             <input  class="form-control" type="text" name="name[]"  placeholder="station name">
           </div>       
           <div class="col-sm-3">
             <label>Arrival Time</label>
             <input  class="form-control" type="time" name="arrival[]"  placeholder="arrival time">
           </div>       
           <div class="col-sm-3">
             <label >Departure Time</label>
             <input  class="form-control" type="time" name="dept[]"  placeholder="departure time">
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
      z =' <div class="col-sm-3"> <label> Station # </label><input  class="form-control" type="text" name="name[]" value="'+ c.toString() + '" >  </div>'

       b=    '<div class="col-sm-3 " >'
        c1=     '<label> Station Name </label>'
         d=    '<input  class="form-control" type="text" name="name[]"  placeholder="station name">'
         e=  '</div>'       
         f=  '<div class="col-sm-3">'
          g=   '<label>Arrival Time</label>'
          h=   '<input  class="form-control" type="time" name="arrival[]"  placeholder="arrival time">'
          i= '</div>'       
          j= '<div class="col-sm-3">'
          k=   '<label >Departure Time</label>'
          l=   '<input  class="form-control" type="time" name="dept[]"  placeholder="departure time">'
          m= '</div>'
        n ='</div>'

        document.getElementById("station-form").innerHTML +=  a+z+b+c1+d+e+f+g+h+i+j+k+l+m+n;

        }

</script>

</body>
</html>



