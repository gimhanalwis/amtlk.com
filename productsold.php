<?php if(isset($_REQUEST['category'])){
    $cat=$_REQUEST['category'];
}
//check if what type sql query want
if(isset($_POST['search']))
         {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $sql = "SELECT * FROM products WHERE CONCAT(`Name`, `Model`, `Manufacturer`, `Category`,`Price`,`Description`) LIKE '%".$valueToSearch."%'";
        
    
         }
        else if(isset($cat)){
            $sql = "SELECT * FROM products where Category='$cat'";
        }      
         else {
            $sql = "SELECT * FROM products";
            
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
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

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
                            <form class="card card-sm" action="products.php" method="post">
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

        <div class="col-lg-3 text-center">

          <h1 class="my-4">Categories</h1>
            <hr>    
          <div class="list-group">
              <?php
        $servername = "localhost:3306";
        $username = "health1s_anura";
        $password = "gimhankalhara1234";
        $dbname = "health1s_anura";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
              

        $sqlcat = "SELECT DISTINCT Category FROM products";
        $resultcat = mysqli_query($conn, $sqlcat);

        if (mysqli_num_rows($resultcat) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($resultcat)) {?>
            <a href="products.php?category=<?php echo $row["Category"]; ?>" class="list-group-item"><?php echo $row["Category"]; ?></a><?php }} ?>
            <a href="products.php" class="list-group-item">All</a>
          </div>
          
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="row">
        <?php
        $servername = "localhost";
        $username = "health1s_anura";
        $password = "gimhankalhara1234";
        $dbname = "health1s_anura";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
            
        
         
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo $row["Url"]; ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="product.php?id=<?php echo $row["Name"]; ?>"><?php echo $row["Name"]; ?></a>
                  </h4>
                  <h5><?php echo $row["Price"]; ?></h5>
                  <p class="card-text"><?php echo $row["Model"]; ?><br><?php echo $row["Manufacturer"]; ?><br><?php echo $row["Category"]; ?></p>
                </div>
                  <div class="card-footer">
              <a href="product.php?id=<?php echo $row["Name"]; ?>" class="btn btn-primary">Find Out More!</a>
            </div> 
              </div>
               
            </div><?php }} else{
             
              ?><div class="col-lg-8 col-md-6 mb-4"><div class="text-center"><h2>Sorry!No Results Found.</h2><hr></div></div><?php
             } 
             ?>

           

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->
          
      </div>
      <!-- /.row -->
        
    </div>
    <!-- /.container -->
</section>
    <section id="contact" class="bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center text-white">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row text-white">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p class="text-white">
              <a href="mailto:your-email@your-domain.com" class="text-white">feedback@startbootstrap.com</a>
            </p>
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
