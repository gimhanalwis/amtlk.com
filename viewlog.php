<?php
        session_start();
        if(!isset($_SESSION['uname']))
        {
                header("location: admin.php");
        }
        $uname=$_SESSION['uname'];
        
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

    <header class="masthead8 text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Views Log</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Viewers of the site.</p>
            
          </div>
        </div>
      </div>
    </header>

    <section class="">
         <div class="container text-center">
       <h2>Views Log</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>IP</th>
        <th>Page</th>
        <th>Refferre</th>
        <th>Time</th>
        <th>User Agent</th>  
      </tr>
    </thead>
    <tbody>
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
$results_per_page = 20;

// find out the number of results stored in database
$sql='SELECT * FROM visitor';
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


$sql='SELECT * FROM visitor ORDER By time DESC LIMIT ' . $results_per_page . ' OFFSET ' . $this_page_first_result;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {?>       
      <tr>
        <td><?php echo $row["ip"]; ?></td>
        <td><?php echo $row["page"]; ?></td>
        <td><?php echo $row["refferre"]; ?></td>
        <td><?php echo $row["time"]; ?></td>
        <td><?php echo $row["user_agent"]; ?></td>  
      </tr><?php } }?>
    </tbody>
  </table>
  <div class="row">
            
                
                <div class="row container">
                <div class="col-lg-7 text-center ">
              <ul class="pagination text-center">
                  
<?php echo '<li class="page-item"><a class="page-link" href="viewlog.php?page=1">First</a></li>'; 
for ($page=$page;$page<=$number_of_pages;$page++) {
  echo '<li class="page-item"><a class="page-link" href="viewlog.php?page=' . $page . '">' . $page . '</a></li>';
}    
 echo '<li class="page-item"><a class="page-link" href="viewlog.php?page='.$number_of_pages.'">Last</a></li>';                ?></ul>
                </div> </div></div>
                <a href=panel.php><button class="btn btn-primary">Back</button></a>
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