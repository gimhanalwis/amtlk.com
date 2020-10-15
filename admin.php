<?php
session_start();
if(isset($_SESSION['uname']))
        {
             header("location: panel.php");    
                
        }
if(isset($_POST['submit'])) {

        $uname=$_REQUEST["username"];
        $psw=($_REQUEST["password"]);
    
       
        $servername = "localhost";
        $username = "amtlkcom_admin";
        $password = "anura1234";
        $dbname = "amtlkcom_main";
    
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //track visitors
        date_default_timezone_set('Asia/Colombo');
        $ipaddress = $_SERVER['REMOTE_ADDR'];
         $page = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];
         $referrer = $_SERVER['HTTP_REFERER'];
         $datetime = date("F j, Y, g:i:s a");
         $useragent = $_SERVER['HTTP_USER_AGENT'];
            $sqls = "INSERT INTO visitor values('$ipaddress','$page','$referrer','$datetime','$useragent')";
            $conn->query($sqls);
//end track visitors
        $sql1 = "SELECT * FROM login WHERE username='$uname' LIMIT 1";
        $result1 = $conn->query($sql1);
        $row = $result1->fetch_assoc();
        $vrfy=password_verify($psw,$row["password"]);
        
        $sql2 = "SELECT * FROM users WHERE username='$uname' LIMIT 1";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $vrfy2=password_verify($psw,$row2["password"]);


        if ($vrfy==1) {
            // output data of each row
            //userlog query
            $sqluser = "INSERT INTO userlog values('$uname','$ipaddress','$page','$datetime','$useragent')";
            $conn->query($sqluser);
            //end user log query
                $_SESSION['uname']=$_POST['username'];
                header('Location:panel.php');
                
            //echo "<script>setTimeout(\"location.href = 'panel.php';\",10);</script>";
            
        }elseif($vrfy2==1) {
                
                //if ($result->num_rows > 0) {
                //userlog query
            $sqluser = "INSERT INTO userlog values('$uname','$ipaddress','$page','$datetime','$useragent')";
            $conn->query($sqluser);
            //end user log query
                $_SESSION['user']=$_POST['username'];
                 header('Location:new.php');
               
               // echo "<script>setTimeout(\"location.href = 'new.php';\",10);</script>";
               // }else{
                    
                    
                //}
        }else{
            
            $msg='<div class="alert alert-danger"><strong>Invalid!</strong> Username or Password.</div>';
        }
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
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead4 text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Admin Login</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Login Admin and Users Here</p>
            
          </div>
        </div>
      </div>
    </header>

 <section class="" id="about">
         <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          
          <?php
          echo $msg;
          ?>
          
          <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="" method="post" enctype="multipart/form-data">
              <div class="form-label-group">
                <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                <label for="inputEmail">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign in</button>
            </form>
          </div>
        </div>
          
          
          
          
                </div>
    </div>
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