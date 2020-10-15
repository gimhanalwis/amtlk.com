<?php
        session_start();
        if(isset($_SESSION['uname']))
        {
                
                
        }
        else{
           header("location: admin.php"); 
        }
        
        
        
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Anura Motor Trading(Pvt)Ltd</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Anura motors Trading</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#product">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php" style="color:#F05F40">Logout</a>
            </li>  
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead5 text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Control Panel</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Control Panel of the site.</p>
            
          </div>
        </div>
      </div>
    </header>

    <section class="">
         <div class="container text-center">
    <div class="row mx-auto">
      <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="img/add.svg" alt="">
            <div class="card-body">
              <h4 class="card-title">Add Items to Website.</h4>
              <p class="card-text"></p>
              <p class="card-text"></p>     
            </div>
           <div class="card-footer">
              
              <a href="new.php" class="btn btn-primary">Insert</a>
            </div> 
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="img/del.svg" alt="">
            <div class="card-body">
              <h4 class="card-title">Delete Items from Website.</h4>
              <p class="card-text"></p>
              <p class="card-text"></p>     
            </div>
           <div class="card-footer">
               
              <a href="del.php" class="btn btn-primary">Delete</a>
            </div> 
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="img/refresh.svg" alt="">
            <div class="card-body">
              <h4 class="card-title">Update Items on the Website</h4>
              <p class="card-text"></p>
              <p class="card-text"></p>     
            </div>
           <div class="card-footer">
               
              <a href="edit.php" class="btn btn-primary">Update</a>
            </div> 
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="img/user.svg" alt="">
            <div class="card-body">
              <h4 class="card-title">Add Non Admin Users to Website.</h4>
              <p class="card-text"></p>
              <p class="card-text"></p>     
            </div>
           <div class="card-footer">
               
              <a href="adduser.php" class="btn btn-primary">Add User</a>
            </div> 
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="img/reset.svg" alt="">
            <div class="card-body">
              <h4 class="card-title">Reset user Passwords.</h4>
              <p class="card-text"></p>
              <p class="card-text"></p>     
            </div>
           <div class="card-footer">
              <a href="reset.php" class="btn btn-primary">Reset</a>
            </div> 
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="img/access.svg" alt="">
            <div class="card-body">
              <h4 class="card-title">User Logins</h4>
              <p class="card-text"></p>
              <p class="card-text"></p>     
            </div>
           <div class="card-footer">
              <a href="userlog.php" class="btn btn-primary">View</a>
            </div> 
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="img/activity.svg" alt="">
            <div class="card-body">
              <h4 class="card-title">Check activity log.</h4>
              <p class="card-text"></p>
              <p class="card-text"></p>     
            </div>
           <div class="card-footer">
              <a href="viewlog.php" class="btn btn-primary">Check</a>
            </div> 
          </div>
        </div> 
    </div>
             <a href="logout.php" class="btn btn-primary btn-lg text-center">Logout</a>         
  </div>
    </section>

    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>