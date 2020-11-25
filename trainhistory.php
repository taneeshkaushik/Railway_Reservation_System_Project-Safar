<?php
//include auth.php file on all secure pages

include("admin_auth.php");
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
    <li><a href="admin.php"> Back </a></li>
    <!-- <li><a href="history.php"> History </a></li>
    <li><a href="addtrain.php"> Add Train </a></li> -->
  
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

  <h2> Following Trains were Added </h2>
    <div class="btn-group-vertical" style="width:100%">
  
    
    <?php
       require('db.php');
       $query = "SELECT * FROM ".$_SESSION['admin']."_trains";
       $result = mysqli_query($con,$query) or die(mysql_error());
       
       if(mysqli_num_rows($result) >0) {
        ?>

        <table class="table ">
        <tr>
          <th class="text-center"> Train Number  </th>
        </tr>

       <?php

        while($row = mysqli_fetch_assoc($result)){
          ?>
        <tr>
        
         <td>
           <?php echo $row["train_id"] ?>
         </td>


  
        </tr>
         <?php
        }

        ?>
        </table>
        <?php

       }
       else{
         ?>
       <h4> No history available </h4>
        <?php
       }

    ?>
    



    </div>


  </div>


</div>




</body>


</html>