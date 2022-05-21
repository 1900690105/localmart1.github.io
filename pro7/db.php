<?php

$servername = "sql102.epizy.com";
$username = "epiz_31776171";
$password = "7dniz5new7YO";
$db = "epiz_31776171_ecommerece";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
