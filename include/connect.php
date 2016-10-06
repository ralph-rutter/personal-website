<?php
//connect to database
$con = new PDO("mysql:host=192.168.20.56;dbname=ralphs_blog","root","");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>