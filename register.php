
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


//  $creditcard = stripslashes($_REQUEST['creditcard']);
//  $creditcard = mysqli_real_escape_string($con,$creditcard);


 $password1 = stripslashes($_REQUEST['password1']);
 $password1 = mysqli_real_escape_string($con,$password1);

//  echo $userid . $name .$email.$phone.$address.$password;

if($password == $password1)
{

$query = "INSERT INTO `booker` (`username`, `Name`,`address`, `email`, `mobile`,`password`) VALUES ('$userid', '$name','$address' , '$email', '$phone' , '".md5($password)."' );";
        $result = mysqli_query($con,$query);
        
        if($result){
         $q1 = "CREATE table ".$userid."_ticket_table
         (
             pnr int, 
             train_id int,
             ticket_date date,
             primary key(pnr)
         );";

         $q2 = "CREATE table ".$userid."_passengers
          (
              aadhar INT NOT NULL,
              name text,
              age int,
              sex varchar(20),
              PRIMARY key(aadhar)
          );";

         $q3 = "CREATE table ".$userid."_tic_pas
         (
             pnr int not null,
             aadhar int not null,
             primary key(pnr, aadhar),
             foreign key(pnr) REFERENCES ".$userid."_ticket_table(pnr), 
             foreign key (aadhar) REFERENCES ".$userid."_passengers(aadhar)
         
         );";
         $res1 = mysqli_query($con,$q1);
         $res2 = mysqli_query($con,$q2);
         $res3 = mysqli_query($con,$q3);

         if($res1 and $res2 and $res3) {
     echo '<script>alert("You are registered Successfully."); history.go(-2);</script>'; 

       
} else {    echo '<script>alert("Some Error in registration"); history.go(-1);</script>';  }
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
    <h2 class="text-center">User Registration Form</h2><br>
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
        
        <!-- <div class="form-group">
          <label >Your Credit Card Number:</label>
          <input type="text" class="form-control"  placeholder="Enter your credit card number" name="creditcard" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div> -->
    
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
        <a href ="register_admin.php" >Register as Admin</a>
 
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