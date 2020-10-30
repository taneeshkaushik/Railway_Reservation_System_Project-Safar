<!-- <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body> -->
<?php
require('db.php');
require('header.php');

if (isset($_REQUEST['userid'])){

 $userid = stripslashes($_REQUEST['userid']);
 $userid = mysqli_real_escape_string($con,$userid); 
 $name = stripslashes($_REQUEST['name']);
 $name = mysqli_real_escape_string($con,$name); 

 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email); 

 $phone = stripslashes($_REQUEST['phone']);
 $phone = mysqli_real_escape_string($con,$phone);

 $address = stripslashes($_REQUEST['address']);
 $address = mysqli_real_escape_string($con,$address);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);



 $password1 = stripslashes($_REQUEST['password1']);
 $password1 = mysqli_real_escape_string($con,$password1);

//  echo $userid . $name .$email.$phone.$address.$password;

if($password == $password1)
{

$query = "INSERT INTO `user_registration` (`user_id`, `Name`, `Password`, `email`, `address`, `phoneNo`) VALUES ('$userid', '$name', '".md5($password)."', '$email', '$address', '$phone');";
        $result = mysqli_query($con,$query);
        
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }

    }
  
  else{
// Display the alert box  
echo '<script>alert("Passwords do not match."); history.go(-1);</script>'; 
  }
}
    else{
?>

<div class="container" style="margin-top:20px;" > 
    <div class="jumbotron"  style=" background:	#C0C0C0; opacity:75%" >
    <div>    
    <h2 class="text-center">Registration Form</h2><br>
    </div>
      <form action="" class="needs-validation" method ="post" novalidate>
        
      <div class="form-group">
          <label >UserId:</label>
          <input type="text" class="form-control"  placeholder="Enter Userid" name="userid" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
          <label >Name:</label>
          <input type="text" class="form-control"  placeholder="Enter your name" name="name" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>        
        <div class="form-group">
          <label >Phone No:</label>
          <input type="text" class="form-control"  placeholder="Enter your phone number" name="phone" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>        
        <div class="form-group">
          <label >Email:</label>
          <input type="text" class="form-control"  placeholder="Enter your email" name="email" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>        
        <div class="form-group">
          <label >Address:</label>
          <input type="text" class="form-control"  placeholder="Enter your address" name="address" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>

    
        <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control"  placeholder="Enter password" name="password" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
          <label>Confirm Password:</label>
          <input type="password" class="form-control"  placeholder="Reenter the password" name="password1" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>

      </form>
      
    
<script>
  // Disable form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  </script>



<?php } ?>
</body>
</html>