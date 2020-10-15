<?php
session_start();
        if(!isset($_SESSION['uname']))
        {
                header("location: admin.php");
        }
        
        
        if(isset($_POST['remove'])) {           
        $servername = "localhost";
        $username = "amtlkcom_admin";
        $password = "anura1234";
        $dbname = "amtlkcom_main";
        $id=$_REQUEST["id"];
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        // sql to delete a record
        $sql = "SELECT * FROM products WHERE id='$id'";
        
        $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    // output data of each row
                    $sql2 = "DELETE FROM products WHERE id='$id'";
                    $result2 = $conn->query($sql2);
                    
                 $msg='<div class="alert alert-success">
          <strong>Success!</strong> Item Delete Successfully.
        </div>';
                    }
                 else {
                $msg='<div class="alert alert-danger">
          <strong>Invalid!</strong> Invalid Item Id.
        </div>';
                   
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
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php" style="color:#F05F40">Logout</a>
            </li>   
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead3 text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Remove Products</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Remove Products to Site</p>
            
          </div>
        </div>
      </div>
    </header>

    <section class="" id="about">
        <div class="container">
        <div class="col-lg-8">
        
<?php
echo $msg;
?>    
      <form action="del.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Item Id</label>
    <input type="text" class="form-control" name="id"placeholder="Enter Item Name" required>
    
  </div>
  <button type="submit" class="btn btn-primary" value="remove" name="remove">Remove</button>
  <a href=panel.php><button class="btn btn-primary">Cancel</button></a>          
</form></div>
        
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