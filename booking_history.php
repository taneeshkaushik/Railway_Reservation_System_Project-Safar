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
      <!-- <li class="active"><a href="#">Check PNR</a></li> -->

      <li><a href="index.php">Back</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['userid']; ?></a> </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>

<div class="container">

  <div class="well text-center">

  <h2> Following Tickets were booked by You. </h2>
    <div class="btn-group-vertical" style="width:100%">
  
    
    <?php
       require('db.php');
       $query = "SELECT * FROM ".$_SESSION['userid']."_ticket_table";
       $result = mysqli_query($con,$query) or die(mysql_error());
       
       if(mysqli_num_rows($result) >0) {
        ?>

        <table class="table ">
        <tr>
          <th class="text-center"> PNR Number  </th>
          <th class="text-center"> Train No </th>
          <th class="text-center"> Ticket  Date </th>
          <th class="text-center"> Action </th>

        </tr>

       <?php

        while($row = mysqli_fetch_assoc($result)){
          ?>
        <tr>
        
         <td>
           <?php echo $row["pnr"] ?>
         </td>
         <td>
           <?php echo $row["train_id"] ?>
         </td>
         <td>
           <?php echo $row["ticket_date"] ?>
         </td>
         <td> <button >View More</button>  </td>

  
        </tr>
         <?php
        }

        ?>
        </table>
        <?php

       }
       else{
         ?>
       <h4> No Tickets Booked by You </h4>
        <?php
       }

    ?>
    



    </div>


  </div>


</div>




</body>


</html>