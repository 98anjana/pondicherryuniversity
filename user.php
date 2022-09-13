<?php
session_start();

// if(isset($_SESSION['regno'])){
//   echo $_SESSION['regno'];
// }else{

//   if(isset($_COOKIE['regno']) || isset($_COOKIE['pwd'])){
//     echo $_COOKIE['regno'];
//   }
// }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .logout-link{
     display: inline-block;
     background-color:#162A83;
     color:white;
     padding:5px 8px;
     text-decoration: none;
     margin-top:2%;
     /* margin-left:1%; */
    }
   

th{
  font-weight: bold;
  text-align: center;
  width:300px;
} 

  th,td,tr{ 
    border: 1px solid black;
    background-color: white;
    height:50px;
    /* overflow-x:auto; */
} 

#center{
    font-weight: bolder;
    font-size:24px;
}



/* desktop:1200px , laptop:1024px , tablet:768px, mb:480px */


@media screen and (max-width:768px){
   .container{ 
    height:486px;

    }
  
    .table{ 
      border: 1px solid rgb(0, 0, 0);
      margin: auto;
    }

  

  @media screen and (max-width:320px){

    
      .table{ 
        border: 1px solid rgb(0, 0, 0);
        margin: auto;}
  
  }


}
    </style>
    <title>pondicherry_university</title>
  </head>
  <body>
    <div class="container-fluid text-left mt-5">
      <div class="row">
      <div class="col-lg-5 col-md-5  w-100 text-center">

    <?php

include 'config.php';

$sql = "SELECT * FROM `std_details` where regno = '".$_COOKIE['regno']."'";
$sql_run = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($sql_run)) {
  
   ?>

  <h5 style="font-size:40px;"><?php echo $row['regno']; ?></h5>
  <img src="<?php echo $row['file']; ?>" height="260px" width="270px">
  <h5 class="mt-2"><?php echo $row['name']; ?></h5>
  <h5 class="mt-1"><?php echo $row['course']; ?></h5>

  <h5><a href="std_logout.php" class="logout-link text-left">Click here to Logout</a></h5>

  

  <?php
}

?>

</div>

<div class="col-lg-7 col-md-7">
<?php

$err='';

include 'config.php';

$sql = "SELECT * FROM `marklist` where regno = '".$_COOKIE['regno']."'";
$sql_run = mysqli_query($conn, $sql);
if(mysqli_num_rows($sql_run)<0){
  $err="Error **********" ;
 }
while ($row = mysqli_fetch_assoc($sql_run)) {
   ?>
   
  <h4 class="mb-5">Mark Sheet</h4>
  <table class="mytable">
    <tr>
    <th class="">SEMESTER</th>
    <th>GRADE</th>
    </tr>
    <tr class="text-center">
      <td>Semester - 1</td>
      <td><?php echo $row['sem1']; ?></td>
    </tr>
    <tr class="text-center">
      <td>Semester - 2</td>
      <td><?php echo $row['sem2']; ?></td>
    </tr>
    <tr class="text-center">
      <td>Semester - 3</td>
      <td><?php echo $row['sem3']; ?></td>
    </tr>
    <tr class="text-center">
      <td>Semester - 4</td>
      <td><?php echo $row['sem4']; ?></td>
    </tr>
    <tr class="text-center">
      <td>Semester - 5</td>
      <td><?php echo $row['sem5']; ?></td>
    </tr>
    <tr class="text-center">
      <td>Semester - 6</td>
      <td><?php echo $row['sem6']; ?></td>
    </tr>
  </table>
  
 
  <?php
}

?>

  <h1 style="color:red;"><?php echo $err ; ?></h1>
</div>
</div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>