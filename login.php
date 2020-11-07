
    <?php
      require('header.php');
      require('db.php');
      session_start();
      if(isset($_POST['userid'])){
        $userid = stripslashes($_REQUEST['userid']);
      
        //escapes special characters in a string
        $userid = mysqli_real_escape_string($con,$userid);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);

        if($userid == 'admin' && $password == 'admin')
        {
          $_SESSION['userid'] = 'admin';
          header("Location:admin.php");
        }
        
        // echo $userid . $password;

        $query = "SELECT * FROM `user_registration` where user_id ='$userid' and Password ='".md5($password)."'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $r = mysqli_fetch_assoc($result);


        $rows = mysqli_num_rows($result);
        if($rows == 1) {
          $_SESSION['userid'] = $userid;
          header("Location:index.php");
        }
        else {
          echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }

      }else   
         {
    ?>
    

    <div class="container-fluid"> 
    <br>
 <h2 class="text-center">
 Welcome to Railway Registration System
</h2>
<br>
    <div class="jumbotron" style="width:100%;#C0C0C0; opacity:75%;" >
    <div>    
    <h2 class="text-center text-dark">Login</h2><br>
    </div>
      <form action="" class="needs-validation" method ="post" novalidate>
        <div class="form-group">
          <label for="uname "><h5> UserId: </h5></label>
          <input type="text" class="form-control" id="uname" placeholder="Enter username" name="userid" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
          <label for="pwd"><h5>Password:</h5></label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <h5> Don't have a Account. <a class="btn btn-outline btn-dark" style="margin-left: auto; " href="register.php">Click here to Register </a></h5>

      </form>
      
      </div>
      </div>
    
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