<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "pondicherry_university";

// connection query ---

$conn = mysqli_connect($server,$username,$password,$db_name) or die(mysqli_error($conn));


?>