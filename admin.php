<?php
session_start();

// if(isset($_SESSION['temail'])){
//   echo $_SESSION['temail'];
// }else{

//   if(isset($_COOKIE['temail']) || isset($_COOKIE['tpwd'])){
//     echo $_COOKIE['temail'];
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

    <title>pondicherry_university</title>
    <style>
      .logout-link{
     display: inline-block;
     background-color:black;
     color:white;
     padding:5px 8px;
     text-decoration: none;
     margin-top:2%;
     /* margin-left:1%; */
    }

    @media screen and (max-width:768px){
   .container{ 
    height:486px;

    }
  
    .table{ 
      margin: auto;
    }

  

  @media screen and (max-width:320px){

    #displayDataTable{
      margin: auto;
      margin-left: 0px;
    }
     
  }


}
    </style>
  </head>
  <body>

  <div class="header2">
 <nav class="navbar navbar-expand-lg " style=" background-color:#28497a;">
  <a class="navbar-brand" href="#" style="opacity:0;">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <button  class="btn btn-warning" id="u-details" type="submit" onclick="userDetails()">Student Details</button>
      </li>
      <li class="nav-item">
        <button  class="btn btn-info ml-3" id="user-marklist" type="button" onclick="markdetails()">Marks</button>
      </li> 
      <!-- <li class="nav-item">
      <button id="admin-details" type="button">admindetails</button>
      </li>
	  -->
    </ul>

    <h6 class="text-white"><?php echo "WELCOME<br>".$_COOKIE['emailid'];?></h6>
    
  </div>
</nav>


<div class="container-fluid text-center mt-2">
  <div class="row">
    <div class="col-md-1 col-lg-1 col-12">

    <?php

include 'config.php';

$sql = "SELECT * FROM `adm_details` where email = '".$_COOKIE['emailid']."'";
$sql_run = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($sql_run)) {
   ?>

  <h6 style="color:red;">Logged In</h6>
  <h5 style="font-size:20px;"><?php echo $row['name']; ?></h5>
  <img src="<?php echo $row['file']; ?>" height="140px" width="130px">
  <!-- <h5 class="mt-2"><?php echo $row['name']; ?></h5> -->
  <!-- <h5 class="mt-1"><?php echo $row['course']; ?></h5> -->

  <h5><a href="tea_logout.php" class="logout-link text-left mt-2">Logout</a></h5>

  

  <?php
}

?>
    </div>

    <div class="col-md-11 col-g-11 col-12">
      <div class=" table-responsive" id="displayDataTable"></div>

     
   
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--  Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

    <script>

function userDetails() {
  window.location.href="u_details.php";
}


function markdetails() {
         window.location.href = "marklist_crud.php";
      }

      // $(document).ready(function(){
      //     $("#u-details").click(function(){
      //       $(".progress").hide();
      //       // window.location.href="u_details.php";
      //     });
      //   });
    </script>



  </body>
</html>