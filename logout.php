<?php
session_start();

unset($_SESSION['uname']);

unset($_SESSION['user']);

                
echo '<h1>You have been successfully logout</h1>';
echo "<script>setTimeout(\"location.href = 'admin.php';\",2000);</script>";
?>