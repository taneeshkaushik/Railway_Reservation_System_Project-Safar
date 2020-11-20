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

  <div class="well text-center">

  <h2 >ADMIN PORTAL</h2>
  <hr>

    <div class="btn-group-vertical" style="width:400px">
      <button type="button" class="btn btn-lg btn-primary" >ADD TRAIN</button>
      <br>
      <button type="button" class="btn btn-lg btn-primary">REMOVE TRAIN</button>
      <br>
    
    </div>


  </div>


</div>


<div class="modal fade" id="bookTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- Form starts here -->
        <form>
          <div id="add-train" class="form-group">
            <label  class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name0" required="true">
      
          </div >
        
          <div class="form-group">
            <label for="journey_date" class="col-form-label"> Journey Date:</label>
            <input type="date" class="form-control" id="journey_date" required="true">
          </div>

 
        </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Book Ticket</button>
      </div>
    </div>
  </div>
</div>



</body>


</html>