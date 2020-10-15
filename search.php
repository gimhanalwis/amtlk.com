<?php if(isset($_REQUEST['Manufacturer'])){
    $man=$_REQUEST['Manufacturer'];
}
//check if what type sql query want
if(isset($_REQUEST['valueToSearch']))
         {
        $valueToSearch = $_REQUEST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $sql = 'SELECT * FROM products WHERE CONCAT(`Name`, `Model`, `Manufacturer`, `Category`,`Price`,`Description`) LIKE "%'.$valueToSearch.'%"';
        
    
         }
else{
    header("location: products.php");
}
        
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anura Motor Trading (Pvt)Ltd is one of the largest importers and distributors of automotive spare parts in Kandy,Gampola,Weligalle,Gelioya,Sri Lanka.">
    <meta name="author" content="Gimhan Kalhara">
    <meta name="keywords" content="Anuramotor,Anura Motor trading,Anura Motors Trading,Gelioya,Srilanka,Autoparts,Search">

    <title>Anura Motor Trading(Pvt)Ltd-Search Result</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
 
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

    <header class="masthead2 text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Anura Motors Trading (pvt) Ltd.</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">DEALERS IN USED JAPANEASE MOTOR SPARE PARTS & ENGINES.</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#find">Find Products</a>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <section id="find"> 
    <div class="container">
 
    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm" action="search.php" method="post">
                                <div class="card-body row no-gutters align-items-center">
                            
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="text" name="valueToSearch" placeholder="Search topics or keywords">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit" name="search">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>    
        <hr style="max-width: 1000px;">
      <div class="row">

        <div class="col-lg-3 text-center ">

          <h1 class="my-4">Brands</h1>
            <hr>    
          <div class="list-group">
              <?php
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

        $sqlcat = "SELECT DISTINCT Manufacturer FROM products";
        $resultcat = mysqli_query($conn, $sqlcat);

        if (mysqli_num_rows($resultcat) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($resultcat)) {?>
            <a href="products.php?Manufacturer=<?php echo $row["Manufacturer"]; ?>" class="list-group-item orange text-uppercase"><?php echo $row["Manufacturer"]; ?></a><?php }} ?>
            <a href="products.php" class="list-group-item orange text-uppercase">All</a>
          </div>
          
          <!-- filter-->
           <div>
               <br>
               <div class="dropdown">
      <h4 class="">Select Categories</h4>
      <hr>
  <button class="btnsq btn-lg btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    --Categories--
  </button>
      <form action="products.php" method="post">
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
  
     <?php 
     $sqlcat='SELECT DISTINCT Category FROM products'; 
     $results = mysqli_query($conn,$sqlcat);

    while ($rows = mysqli_fetch_assoc($results)){ 
    ?>
      
          <a class="dropdown-item" href="products.php?Category=<?php echo $rows["Category"];?>"><?php echo $rows["Category"];?></a>
          
    
    <?php } ?>
     
  </div>
       </div>
    <br><button class="btn btn-primary" type="submit" name="filter">Filter</button>
    </form>
            </div>
            <!--end filter-->
          
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="row">
        <?php
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
        // define how many results you want per page
$results_per_page = 6;

// find out the number of results stored in database

$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sqln=$sql .' LIMIT '.$results_per_page . ' OFFSET ' . $this_page_first_result  ;
$result2 = mysqli_query($conn, $sqln);




        
         
       

        if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <a href="#"><img class="card-img-top" src="<?php echo $row["Url"]; ?>" alt=""></a>
                <div class="card-body">
                    <div class="card-footer">
                  <h6 class="card-title">
                    <a href="product.php?id=<?php echo $row["id"]; ?>"><?php echo $row["Name"]; ?></a>
                  </h6>
                  <h6><?php echo $row["Price"]; ?></h6>
                  <h6><?php echo $row["Model"]; ?><br><?php echo $row["Manufacturer"]; ?><br><?php echo $row["Category"]; ?></h6>
                </div>
                  
              <a href="product.php?id=<?php echo $row["Id"]; ?>" class="btn btn-primary">Find Out More!</a>
            </div> 
              </div>
               
            </div><?php }} else{
             
              ?><div class="col-lg-8 col-md-6 mb-4"><div class="text-center"><h2>Sorry!No Results Found.</h2><hr></div></div><?php
             }?> 
              
             
            
           

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->
          
      </div>
      <!-- /.row -->
        <div class="row">
            
                <div class="col-lg-3 text-center "></div>
                <div class="col-lg-5 text-center ">
              <ul class="pagination text-center">
<?php for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<li class="page-item"><a class="page-link" href="search.php?valueToSearch='.$valueToSearch.'&&page=' . $page . '">' . $page . '</a></li> ';
}    
                 ?></ul>
                </div> </div>
    </div>
    <!-- /.container -->
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
