
<?php
//include auth.php file on all secure pages
include("auth.php");
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
<?php
require('db.php');
//session_start();
if(isset($_POST['train_no'])){



 $name = $_REQUEST['name'];
//  $name = mysqli_real_escape_string($con,$name); 

 $age = $_REQUEST['age'];
//  $age = mysqli_real_escape_string($con,$age); 

 $train_no = stripslashes($_REQUEST['train_no']);
 $train_no = mysqli_real_escape_string($con,$train_no);

 $date = stripslashes($_REQUEST['journey_date']);
 $date = mysqli_real_escape_string($con,$date);

 $gender = $_REQUEST['gender'];

 $coachType = $_REQUEST['coach_type'];

//  foreach ($name as $v){
//   echo $v;

//  }
//  foreach ($age as $v){
//         echo $v;
      
//        } 
// foreach ($gender as $v){
//         echo $v;      
//        }
//  echo $train_no . $date . $coachType ;


// Writing of database part will be done here
 
 



}
else{


?>


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

<header >
 <h2 class="text-center">
  Please Enter Your Details
 </h2>
</header>

<div class="container well"> 
    <!-- form starts here -->
    <form method="post" >
          <div id="booking-form" class="form-group">
            <label  class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name[]" required="true">
            <label for="recipient-name" class="col-form-label"> Age:</label>
            <input type="text" class="form-control" name="age[]" required="true">
            <label for="" class="col-form-label">Gender:</label>
            <div class="form-group-inline">
            <select name = "gender[]" class="browser-default custom-select ">
                <option selected>None</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Oth">Other</option>
            </select> 
            </div>       
          </div >
          <div class="form-group" >
          <a onclick="addPassengers()">+Add Passenger</a>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Train No:</label>
            <input type="text" class="form-control" name="train_no" required="true">
          </div>
          <div class="form-group">
            <label for="journey_date" class="col-form-label"> Journey Date:</label>
            <input type="date" class="form-control" name="journey_date" required="true">
          </div>
          <div class="form-group-inline">

          <label for="" class="col-form-label">Choose Coach Type :</label>
            <select name = "coach_type" class="browser-default custom-select ">
                <option value="AC" selected>AC</option>
                <option value="SL">SL</option>
            </select> 
          <div>
            <button type="submit" class="btn btn-success pull-right">Submit</button>

 
        </form>
   



</div>


<script type='text/javascript'>

        var c = 0;
        function addPassengers(){
          c++;
        a =  '<label  class="col-form-label">Name'+ c.toString() +':</label>'
        b =   '<input type="text" class="form-control" name="name[]" required="true">'
        c1 =    '<label for="recipient-name" class="col-form-label"> Age'+c.toString()+':</label>'
        d =  '<input type="text" class="form-control" name="age[]" required="true">'
        e =   '<label for="" class="col-form-label">Gender'+c.toString()+':</label>'
        // f =  '<input type="text" class="form-control" id="age'+ c.toString() +'" required="true">'


        m = '<div>'
        f =   '<select name="gender[]" class="browser-default custom-select " >'
        g =     ' <option selected>None</option>'
        h =     ' <option value="Male">Male</option>'
        i =    ' <option value="Female">Female</option>'
        j=    '<option value="Oth">Other</option>'
        k =   '</select> '
        l = '</div>' 

        document.getElementById("booking-form").innerHTML += a+b+c1+d+e+ m+ f + g+ h+i+j+k+l;

        }

        function aftersubmit(){
          c = 0;
        }

</script>

<?php } ?>

</body>
</html>