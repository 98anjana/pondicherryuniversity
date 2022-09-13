<?php

include 'config.php';

if(isset($_POST['updateid'])){
    $unique_id=$_POST['updateid'];

    $sql = "insert into `std_details` (std_id) values ('$unique_id')";
    $sql_run=mysqli_query($conn,$sql) or die(mysqli_error($conn));
}




// update query ---- 

$uploadDir = 'std_images/';
$allowTypes = array('jpg', 'png', 'jpeg'); 
// Default response 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if(isset($_POST['hidden']) || isset($_POST['name']) || isset($_POST['course']) || isset($_POST['file'])){ 
     
    $unique=$_POST['hidden'];
    $name = $_POST['name']; 
    $course = $_POST['course'];  

    if(!empty($name) && !empty($course)){

        $uploadStatus = 1; 
      // Upload file 
      $uploadedFile = ''; 
      if(!empty($_FILES["file"]["name"])){ 
          // File path config 
          $fileName = basename($_FILES["file"]["name"]); 
          $targetFilePath = $uploadDir . $fileName; 
          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
          if(in_array($fileType, $allowTypes)){ 
              // Upload file to the server 
              if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                  $uploadedFile = $fileName; 
              }else{ 
                  $uploadStatus = 0; 
                  $response['message'] = 'Sorry, there was an error uploading your file.'; 
              } 
          }else{ 
              $uploadStatus = 0; 
              $response['message'] = 'Sorry, only '.implode('/', $allowTypes).' files are allowed to upload.'; 
          } 
      } 
       
      
             // Insert form data in the database 
            
             $sql = "UPDATE std_details SET   name='$name', course='$course',  file='$targetFilePath'  WHERE  std_id='$unique'";
             $sql_run=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            
         

    }else{ 
         $response['message'] = 'All fields are mandatory'; 
    } 
   
   
         }
                           
      
    
// Return response 
echo json_encode($response);



?>