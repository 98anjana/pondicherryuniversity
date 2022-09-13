<?php
include '/wamp64/www/php_program/PondicherryUniversity/config.php';

$uploadDir = 'std_images/';
$allowTypes = array('jpg', 'png', 'jpeg'); 
// Default response 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if(isset($_POST['regno']) || isset($_POST['name']) || isset($_POST['course']) || isset($_POST['pwd']) ||isset($_POST['file'])){ 
     
    $regno = $_POST['regno']; 
    $name = $_POST['name']; 
    $course = $_POST['course'];  
    $pwd = $_POST['pwd']; 
    $encryptPwd=md5($pwd);

     //  Checking empty/ not empty 
    if(!empty($regno) && !empty($name) && !empty($course) && !empty($pwd)){ 

      $valid=true;

    // regno

    if (empty($_POST['regno'])) {
        $response['status'] = 0; 
        $response['message'] = 'please Enter RegNo!'; 
        $valid = false;
    } else {
        $regno = $_POST['regno'];
        if (!preg_match("/^([0-9]{4})$/", $regno)) {
           $response['status'] = 0; 
           $response['message'] = 'Invalid Reg No'; 
            $valid = false;
        }
    }

          // Name ----
    if (empty($_POST['name'])) {
      $response['status'] = 0; 
      $response['message'] = 'please Enter Name!'; 
      $valid = false;
  } else {
      $name = $_POST['name'];
      if (!preg_match("/^[a-zA-z]*$/", $name)) {
         $response['status'] = 0; 
         $response['message'] = ' Name must be only alphabets and white space are allowed'; 
          $valid = false;
      }
  }
  
//   password
if (empty($_POST['pwd'])) {
   $response['status'] = 0; 
   $response['message'] = 'please Enter Password!'; 
   $valid = false;
} else {
   $pwd = $_POST['pwd'];
   $number = preg_match('@[0-9]@', $pwd);
   $uppercase = preg_match('@[A-Z]@', $pwd);
   $lowercase = preg_match('@[a-z]@', $pwd);
   $specialChars = preg_match('@[^\w]@', $pwd);
   if (strlen($pwd) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
      $response['status'] = 0; 
      $response['message'] = 'Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.!'; 
       $valid = false;
   }
}
     

  if($valid==true){

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
       
      if($uploadStatus == 1){ 
         $duplicate=mysqli_query($conn,"SELECT * FROM std_details  WHERE regno='$regno' OR name='$name' OR file='$targetFilePath'");
         if(mysqli_num_rows($duplicate) > 0){ 

            $response['status'] = 0; 
            $response['message'] = 'User Already Exist'; 
         }else{
             // Insert form data in the database 
          $sql="insert into std_details (regno,name,course,pwd,file) values('$regno','$name','$course','$encryptPwd','".$targetFilePath."')";
          $sql_run=mysqli_query($conn,$sql) or die(mysqli_error($conn));

          if($sql_run){ 
              $response['status'] = 1; 
              $response['message'] = 'Form data submitted successfully!'; 
          } 
         }
                           
      } 

  }

       
    }else{ 
         $response['message'] = 'All fields are mandatory'; 
    } 
} 
 
// Return response 
echo json_encode($response);

?>