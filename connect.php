<?php
//connect to database
$con = mysqli_connect("192.168.20.56","root","","my_blog");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>