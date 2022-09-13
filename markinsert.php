<?php

include 'config.php';

$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 

if(isset($_POST['addid'])){
    $unique_id=$_POST['addid'];

    $sql = "insert into `marklist`(std_id) values($unique_id') ";
    $sql_run=mysqli_query($conn,$sql) or die(mysqli_error($conn));
}

if(isset($_POST['hiddendata'])){
    $unique=$_POST['hiddendata'];
    $regno=$_POST['regno'];
    $sem1=$_POST['sem1'];
    $sem2=$_POST['sem2'];
    $sem3=$_POST['sem3'];
    $sem4=$_POST['sem4'];
    $sem5=$_POST['sem5'];
    $sem6=$_POST['sem6'];

    $duplicate = mysqli_query($conn, "SELECT * FROM `marklist` WHERE regno = '$regno'");
        if (mysqli_num_rows($duplicate) > 0) {
            $response['status'] = 0; 
            $response['message'] = 'Mark Already Taken'; 
        } else{

            $query = "insert into `marklist`(std_id,regno,sem1,sem2,sem3,sem4,sem5,sem6) values 
           ('$unique','$regno','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6')";
           $query_run=mysqli_query($conn,$query) or die(mysqli_error($conn));

        }

}




?>