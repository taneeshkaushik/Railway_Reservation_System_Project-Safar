<?php
//include auth.php file on all secure pages
include("auth.php");
include("header.php");
?>


    <p>Welcome <?php echo $_SESSION['userid']; ?>!</p>

    <a href="logout.php">Logout</a>

    <div class="jumbotron">
        <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>



    </body>


</html>