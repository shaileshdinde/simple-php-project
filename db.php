<?php

$projectName = "Demo Proejct";
$connection = mysqli_connect("localhost","root","","sampleproject");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>