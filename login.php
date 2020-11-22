    <?php
      require('header.php');
      require('db.php');
      session_start();
<<<<<<< HEAD
      if(isset($_POST['userid']))
      {
        $userid = stripslashes($_REQUEST['userid']);
        //escapes special characters in a string
=======
      if(isset($_POST['userid'])){
        $fname  = $_REQUEST['login_type'];
        $userid = stripslashes($_REQUEST['userid']);
>>>>>>> 872a6b27ffd6c655ea8421bba3c6d1daef8bf92a
        $userid = mysqli_real_escape_string($con,$userid);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        if ($fname == 0){
          $table = "booker";
        }
        else if($fname == 1)
        {
          $table = "admin";
        }
<<<<<<< HEAD

        // echo $userid . $password;
=======
        
        $query = "SELECT * FROM `".$table."` where username ='$userid' and password ='".md5($password)."'";
        echo $query;
>>>>>>> 872a6b27ffd6c655ea8421bba3c6d1daef8bf92a

        
        $result = mysqli_query($con,$query) or die(mysql_error());
        $r = mysqli_fetch_assoc($result);

        $rows = mysqli_num_rows($result);
        if($rows == 1) {
          $_SESSION['userid'] = $userid;
          if($fname == 0){
          header("Location:index.php");
          }
          else { header("Location:admin.php");}
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
      <label for="login_type"><h5> Login Type </h5></label>

      <select name = "login_type" class="browser-default custom-select ">
                <option value="0">User</option>
                <option value="1">Admin</option>
        
            </select>
          </div> 
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