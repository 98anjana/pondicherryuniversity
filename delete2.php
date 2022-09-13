<?php

include 'config.php';

if(isset($_POST['deleteSend'])){
    $unique = $_POST['deleteSend'];
    $query="DELETE FROM `marklist` WHERE std_id ='$unique'";
    $query_run=mysqli_query($conn,$query);
    $sql = "DELETE FROM `std_details` WHERE std_id ='$unique'";
    $sql_run = mysqli_query($conn, $sql);
}

?>