<?php
$id=$_REQUEST["id"];
if(!isset($id)){
    header("location: products.php");
}
        $servername = "localhost";
        $username = "amtlkcom_admin";
        $password = "anura1234";
        $dbname = "amtlkcom_main";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//views count
$sqlcn = "UPDATE products SET Views=Views+1 WHERE Id='$id'";
$conn->query($sqlcn);


//end views count
//visitor record
date_default_timezone_set('Asia/Colombo');
        $ipaddress = $_SERVER['REMOTE_ADDR'];
         $page = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];
         $referrer = $_SERVER['HTTP_REFERER'];
         $datetime = date("F j, Y, g:i:s a");
         $useragent = $_SERVER['HTTP_USER_AGENT'];
$sqls = "INSERT INTO visitor values('$ipaddress','$page','$referrer','$datetime','$useragent')";
$conn->query($sqls);
//end visitor record
$sql = "SELECT * from products where id='$id' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { $cat=$row["Category"];?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anura Motor Trading (Pvt)Ltd is one of the largest importers and distributors of automotive spare parts in Kandy,Gampola,Weligalle,Gelioya,Sri Lanka.">
    <meta name="author" content="Gimhan Kalhara">
    <meta name="keywords" content="Anuramotor,Anura Motor trading,Anura Motors Trading,Gelioya,Srilanka,Autoparts">

    <title>Anura Motor Trading(Pvt)Ltd-Product Details</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
    

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php#page-top">Anura motors Trading</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#product">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
      </nav>

    <header class="masthead6 text-center text-white d-flex">
          <div class="container my-auto">
            <div class="row">
              <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                  <strong>Product Details</strong>
                </h1>
                <hr>
              </div>
            </div>
          </div>
          </header>

    <section class="" id="contact">
        <div class="container my-auto">
        <div class="row">
            <div class="col-lg-8">
                <div><img src="<?php echo $row["Url"]; ?>" class="img-fluid" alt="Responsive image"></div></div>
            <div class="col-lg-4 ">
             <div>   
            <h6><Strong>Name:</Strong></h6>
            <h6><?php echo $row["Name"]; ?></h6>
            <h6><Strong>Model:</Strong></h6>
            <h6><?php echo $row["Model"]; ?></h6>
            <h6><Strong>Manufacturer:</Strong></h6>
            <h6><?php echo $row["Manufacturer"]; ?></h6>
            <h6><Strong>Category:</Strong></h6>
            <h6><?php echo $row["Category"]; ?></h6>
            <h6><Strong>Price:</Strong></h6>
            <h6><?php echo $row["Price"]; ?></h6>
            <h6><Strong>Description:</Strong></h6>
            <h6><?php echo $row["Description"]; ?></h6>
                   
            </div>
            </div>
            <div class="col-lg-8 mx-auto text-center">
            <p></p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="products.php">Back to Products</a> 
          </div>
            </div>
       </div><?php }} ?>  
    </section>

    <section class="p-0">
   <div class="container my-auto text-center">
       <h3 class="section-heading">Related Products</h3>
            <hr class="my-4">
      <div class="row text-center">
          <?php

$sql = "SELECT * from products where Category='$cat' LIMIT 4";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="<?php echo $row["Url"]; ?>" alt="">
            <div class="card-body">
                <div class="card-footer">
              <h6 class="card-title">
                    <a href="product.php?id=<?php echo $row["Id"]; ?>"><?php echo $row["Name"]; ?></a>
                  </h6>
              <h6 class="card-text"><?php echo $row["Model"]; ?>,<?php echo $row["Manufacturer"]; ?>,<?php echo $row["Category"]; ?></h6>
              <h6 class="card-text"><?php echo $row["Price"]; ?></h6>     
            </div>
           
              <a href="product.php?id=<?php echo $row["Id"]; ?>" class="btn btn-primary">Find Out More!</a>
            </div> 
          </div>
        </div> <?php }}?>
        </div>
   </div>    
        
    </section>

    <section class="bg-dark text-white" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Contact Us</h2>
            <hr class="my-4 light">
            <p class="mb-5">One of the largest importers and distributors of used japan automotive spare parts & Engines in Sri Lanka</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 mx-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>+94 81 231 0189<br>+94 81 375 3230<br>+94 81 231 4190</p>
          </div>
          <div class="col-lg-3 mx-auto text-center">
            <i class="fa fa-map-marker fa-3x mb-3 sr-contact"></i>
            <p>
              No. 64, Kandy Road, Weligalle, Gampola, Sri Lanka,20500.
            </p>
          </div>
        <div class="col-lg-3 mx-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:amtpvtltd@gmail.com">amtpvtltd@gmail.com</a>
            </p>
          </div>
        <div class="col-lg-3 mx-auto text-center">
            <i class="fa fa-facebook fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="https://www.facebook.com/Health-1st-Fitness-center-182266305852008/">Facebook.com</a>
            </p>
          </div>      
        </div>
      </div>
    </section>    
    
    <!-- Map -->
    <section  class="map p-0">
      <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d294.21258807868793!2d80.59373305892743!3d7.190878496499506!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7e9126cadc82d594!2sAnura+Motors!5e0!3m2!1sen!2sus!4v1540557947284"></iframe>
      <br/>
      <small>
        <a href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d294.21258807868793!2d80.59373305892743!3d7.190878496499506!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7e9126cadc82d594!2sAnura+Motors!5e0!3m2!1sen!2sus!4v1540557947284"></a>
      </small>
    </section>
    
    <!-- Footer -->
    <footer class="footer text-center p-0 bg-dark">
      <div class="container"><br><br>
        <p class="text-muted small mb-0 ">Copyright &copy; Anura Motor Trading(Pvt)Ltd 2018.Designed by <a href="mailto:gimhan.kalhara4@gmail.com">G-Kay Solutions.</a></p><br>
      </div>
    </footer>  

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