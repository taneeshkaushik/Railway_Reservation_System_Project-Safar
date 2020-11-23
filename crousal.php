<?php 
//include auth.php file on all secure pages
include("auth.php");

// echo $_SESSION["train_id"];
// echo $_SESSION["date"];
// echo $_SESSION["num_ac"];echo $_SESSION["num_sl"];

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
 Select Seats for Booking. Red Seats are booked and Green seats are Available
 </h2>
</header>



<div class="container well ">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    

    <!-- Wrapper for slides -->
<div class="carousel-inner">

    <div class="item active ">
    
    <div class="container">
    <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 1 LB </button> </div>
            <div class="col-md-1"><button class="btn-success"> 4 LB</button></div>
            <div class="col-md-1"><button class="btn-success"> 9 LB</button></div>
            <div class="col-md-1"><button class="btn-success"> 12 LB</button></div>
            <div class="col-md-1"><button class="btn-success"> 17 LB</button></div>
            <div class="col-md-1"><button class="btn-success"> 20 LB</button></div>

        </div>
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 2 MB</button> </div>
            <div class="col-md-1"><button class="btn-success"> 5 MB</button></div>
            <div class="col-md-1"><button class="btn-success"> 10 MB</button></div>
            <div class="col-md-1"><button class="btn-success"> 13 MB</button></div>
            <div class="col-md-1"><button class="btn-success"> 18 MB</button></div>
            <div class="col-md-1"><button class="btn-success"> 21 MB</button></div>

        </div>
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 3 UB</button> </div>
            <div class="col-md-1"><button class="btn-success"> 6 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 11 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 14 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 19 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 22 UB</button></div>

        </div>
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 7 SL</button> </div>
            <div class="col-md-1"><button class="btn-success"> 8 SU</button></div>
            <div class="col-md-1"><button class="btn-success"> 15 SL</button></div>
            <div class="col-md-1"><button class="btn-success"> 16 SU</button></div>
            <div class="col-md-1"><button class="btn-success"> 23 SL</button></div>
            <div class="col-md-1"><button class="btn-success"> 24 SU</button></div>

        </div>

        <div class="row text-center ">
          <h3>SL1</h3>
        </div>
       </div>
    </div>

  <?php 
  $x = 1;
  while( $x < $_SESSION['num_sl']  ) { ?>

    <div class="item  ">
       <div class="container">
       <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 1 LB </button> </div>
            <div class="col-md-1"><button class="btn-success"> 4 LB</button></div>
            <div class="col-md-1"><button class="btn-success"> 9 LB</button></div>
            <div class="col-md-1"><button class="btn-success"> 12 LB</button></div>
            <div class="col-md-1"><button class="btn-success"> 17 LB</button></div>
            <div class="col-md-1"><button class="btn-success"> 20 LB</button></div>

        </div>
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 2 MB</button> </div>
            <div class="col-md-1"><button class="btn-success"> 5 MB</button></div>
            <div class="col-md-1"><button class="btn-success"> 10 MB</button></div>
            <div class="col-md-1"><button class="btn-success"> 13 MB</button></div>
            <div class="col-md-1"><button class="btn-success"> 18 MB</button></div>
            <div class="col-md-1"><button class="btn-success"> 21 MB</button></div>

        </div>
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 3 UB</button> </div>
            <div class="col-md-1"><button class="btn-success"> 6 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 11 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 14 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 19 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 22 UB</button></div>

        </div>
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 7 SL</button> </div>
            <div class="col-md-1"><button class="btn-success"> 8 SU</button></div>
            <div class="col-md-1"><button class="btn-success"> 15 SL</button></div>
            <div class="col-md-1"><button class="btn-success"> 16 SU</button></div>
            <div class="col-md-1"><button class="btn-success"> 23 SL</button></div>
            <div class="col-md-1"><button class="btn-success"> 24 SU</button></div>

        </div>

        </div>
        <div class="row text-center ">
          <h3>SL<?php echo $x+1;  ?></h3>
        </div>
    </div>

    
      <?php
    $x = $x+1 ;
    } ?>

  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>


  </div>
</div>


<div class="container well">

<div id="myCarousel1" class="carousel slide" data-ride="carousel">
    

    <!-- Wrapper for slides -->
<div class="carousel-inner">

    <div class="item active ">
    
    <div class="container">
    <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 1 LB </button> </div>
            <div class="col-md-1"><button class="btn-success"> 2 LB </button></div>
            <div class="col-md-1"><button class="btn-success"> 7 LB </button></div>
            <div class="col-md-1"><button class="btn-success"> 8 LB </button></div>
            <div class="col-md-1"><button class="btn-success"> 13 LB </button></div>
            <div class="col-md-1"><button class="btn-success"> 14 LB </button></div>

        </div>
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 3 UB</button> </div>
            <div class="col-md-1"><button class="btn-success"> 4 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 9 UB </button></div>
            <div class="col-md-1"><button class="btn-success"> 10 UB </button></div>
            <div class="col-md-1"><button class="btn-success"> 15 UB </button></div>
            <div class="col-md-1"><button class="btn-success"> 16 UB </button></div>

        </div>
\
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 5 SU </button> </div>
            <div class="col-md-1"><button class="btn-success"> 6 SL</button></div>
            <div class="col-md-1"><button class="btn-success"> 11 SU </button></div>
            <div class="col-md-1"><button class="btn-success"> 12 SL</button></div>
            <div class="col-md-1"><button class="btn-success"> 17 SU</button></div>
            <div class="col-md-1"><button class="btn-success"> 18 SL</button></div>

        </div>
       </div>
       <div class="row text-center ">
          <h3>AC1</h3>
        </div>
    </div>

  <?php 
  $x = 1;
  while( $x < $_SESSION['num_ac']  ) { ?>

    <div class="item  ">
       <div class="container">
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 1 LB </button> </div>
            <div class="col-md-1"><button class="btn-success"> 2 LB </button></div>
            <div class="col-md-1"><button class="btn-success"> 7 LB </button></div>
            <div class="col-md-1"><button class="btn-success"> 8 LB </button></div>
            <div class="col-md-1"><button class="btn-success"> 13 LB </button></div>
            <div class="col-md-1"><button class="btn-success"> 14 LB </button></div>

        </div>
        <div class="row" style="margin-left: 360px;">
            <div class="col-md-1"><button class="btn-success"> 3 UB</button> </div>
            <div class="col-md-1"><button class="btn-success"> 4 UB</button></div>
            <div class="col-md-1"><button class="btn-success"> 9 UB </button></div>
            <div class="col-md-1"><button class="btn-success"> 10 UB </button></div>
            <div class="col-md-1"><button class="btn-success"> 15 UB </button></div>
            <div class="col-md-1"><button class="btn-success"> 16 UB </button></div>

        </div>

        <div class="row" style="margin-left: 360px;" >
            <div class="col-md-1"><button class="btn-success"> 5 SU </button> </div>
            <div class="col-md-1"><button class="btn-success"> 6 SL</button></div>
            <div class="col-md-1"><button class="btn-success"> 11 SU </button></div>
            <div class="col-md-1"><button class="btn-success"> 12 SL</button></div>
            <div class="col-md-1"><button class="btn-success"> 17 SU</button></div>
            <div class="col-md-1"><button class="btn-success"> 18 SL</button></div>

        </div>
        </div>
        <div class="row text-center ">
          <h3 >AC<?php echo $x+1;  ?></h3>
        </div>
    </div>

    
      <?php
    $x = $x+1 ;
    } ?>

  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>


  </div>
</div>
