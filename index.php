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
      <a class="navbar-brand" href="#">RailWay</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Check PNR</a></li>
      <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li> -->
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
  Railway Registration System
 </h2>
</header>

<div class="container ">
     
     <h3 class="text-center"><a class="btn btn-primary" data-toggle="modal" data-target="#bookTicket">   Book New Ticket </a></h3>



<div>

<div class="modal fade" id="bookTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Welcome to Booking Portal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- Form starts here -->
        <form>
          <div class="form-group">
            <label  class="col-form-label"> Name:</label>
            <input type="text" class="form-control" id="name1" required="true">
            <label for="recipient-name" class="col-form-label"> Age:</label>
            <input type="text" class="form-control" id="age1" required="true">
            <label for="" class="col-form-label">Gender:</label>
            <select class="browser-default custom-select ">
                <option selected>None</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select>          
          </div >
          <div class="form-group" >
          <a>+Add Passenger</a>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Train No:</label>
            <input type="text" class="form-control" id="train_no" required="true">
          </div>
          <div class="form-group">
            <label for="journey_date" class="col-form-label"> Journey Date:</label>
            <input type="date" class="form-control" id="journey_date" required="true">
          </div>

          <label for="" class="col-form-label">Choose Coach Type :</label>
            <select class="browser-default custom-select ">
                <option selected>AC</option>
                <option value="1">SL</option>
            </select> 
 
          <!-- <div class="form-group">
            <label for="card" class="col-form-label">Card Details :</label>
            <input type="text" class="form-control" id="card-number" required="true">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Card:</label>
            <input type="text" class="form-control" id="recipient-name" required="true">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name" required="true">
          </div> -->

 
        </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary">Book Ticket</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>