<?php
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
$sql = "SELECT * FROM products WHERE name='$id'";

$result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $sql = "DELETE FROM products WHERE name='$id'";
            $result = $conn->query($sql);
            echo"Remove Successfully";
            echo "<script>setTimeout(\"location.href = 'del.php';\",2000);</script>";
            }
         else {
            echo "Invalid Product Name";
            echo "<script>setTimeout(\"location.href = 'del.php';\",2000);</script>";
        }

$conn->close();
?>
