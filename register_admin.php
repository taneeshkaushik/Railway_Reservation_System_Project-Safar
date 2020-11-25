
<?php
require('db.php');
require('header.php');

if (isset($_REQUEST['token'])){

 
  $token = stripslashes($_REQUEST['token']);
  $token= mysqli_real_escape_string($con,$token); 

 $userid = stripslashes($_REQUEST['username']);
 $userid = mysqli_real_escape_string($con,$userid); 
 $name = stripslashes($_REQUEST['name']);
 $name = mysqli_real_escape_string($con,$name); 

 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email); 

 $phone = stripslashes($_REQUEST['phone']);
 $phone = mysqli_real_escape_string($con,$phone);

 $designation = stripslashes($_REQUEST['designation']);
 $designation = mysqli_real_escape_string($con,$designation);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);


 $password1 = stripslashes($_REQUEST['password1']);
 $password1 = mysqli_real_escape_string($con,$password1);
 $q = "select become_admin from `sensitive_info`";
 $run = mysqli_query($con , $q);
 $row = mysqli_fetch_assoc($run);

//  echo $row['become_admin'];

//  echo $userid . $name .$email.$phone.$address.$password;

if($password == $password1 and $token == $row['become_admin'])
{

$query = "INSERT INTO `admin` (`username`, `name`, `designation`, `email`, `mobile`,`password`) VALUES ('$userid', '$name','$designation' , '$email', '$phone' , '".md5($password)."' );";
        $result = mysqli_query($con,$query);
        
        if($result){
          $query1  = "CREATE TABLE ".$userid."_trains_added (train_id   INT NOT NULL, 
           date_added DATE NOT NULL, 
           num_sl     INT, 
           num_ac     INT,
           primary KEY(train_id,date_added),
           foreign key(train_id) references trains(train_id)
          );
          " ;
          

          $query2  = "CREATE TABLE ".$userid."_trains (train_id   INT NOT NULL, 
          primary key (train_id),
          foreign key(train_id) references trains(train_id)
           
          );
          " ;
          //echo $query1;
          $res1 = mysqli_query($con,$query1);
          $res2= mysqli_query($con,$query2);
          if($res1 and $res2){

     echo '<script>alert("You have been registered successfully as admin"); history.go(-3);</script>'; 

} else { 
     echo '<script>alert("Some error"); history.go(-1);</script>'; 
    }
          
        }

    }
  
  else{
// Display the alert box  
echo '<script>alert("Passwords do not match or incorrect token."); history.go(-1);</script>'; 
  }
}
    else{
?>

<div class="container" style="margin-top:20px;" > 
    <div class="jumbotron"  style=" background:	#C0C0C0; opacity:75%" >
    <div>    
    <h2 class="text-center">Admin Registration Form</h2><br>
    </div>
      <form action="" class="needs-validation" method ="post" novalidate>
        
      <div class="form-group">
          <label >Enter Unique Token:</label>
          <input type="password" class="form-control"  placeholder="Enter unique token" name="token" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
          <label >UserId:</label>
          <input type="text" class="form-control"  placeholder="Enter Username" name="username" required>
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
          <label >Designation:</label>
          <input type="text" class="form-control"  placeholder="Designation" name="designation" required>
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