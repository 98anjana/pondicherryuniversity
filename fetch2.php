<?php

$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

session_start();

include '/wamp64/www/php_program/PondicherryUniversity/config.php';


if (isset($_POST['temail']) || isset($_POST['tpwd']))
{

    $email = $_POST['temail'];
    $pwd = $_POST['tpwd'];
    $encryptPwd = md5($pwd);

    //  Checking empty/ not empty
    if (!empty($email) && !empty($pwd)){

        $valid = true;

       // email ------
  if (empty($_POST['temail'])) {
      $response['status'] = 0; 
      $response['message'] = 'please Enter Email!'; 
         $valid = false;
     } else {
         $email = $_POST['temail'];
         $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
         if (!preg_match($pattern, $email)) {
            $response['status'] = 0; 
            $response['message'] = 'Sorry, Invalid Email!'; 
             $valid = false;
         }
     }
        //   password
        if (empty($_POST['tpwd']))
        {
            $response['status'] = 0;
            $response['message'] = 'please Enter Password!';
            $valid = false;
        }
        else
        {
            $pwd = $_POST['tpwd'];
            $number = preg_match('@[0-9]@', $pwd);
            $uppercase = preg_match('@[A-Z]@', $pwd);
            $lowercase = preg_match('@[a-z]@', $pwd);
            $specialChars = preg_match('@[^\w]@', $pwd);
            if (strlen($pwd) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars)
            {
                $response['status'] = 0;
                $response['message'] = 'Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.!';
                $valid = false;
            }
        }

        if ($valid == true)
        {

             $query="SELECT * FROM adm_details WHERE email='$email' && pwd='$encryptPwd'";
             $query_run=mysqli_query($conn,$query) or die(mysqli_error($conn));

             $check=mysqli_num_rows($query_run);

            //  remember check ----
             if(isset($_POST['remember'])){
                $remember=$_POST['remember'];

                if(!empty($remember)){
                    if($check==1){
                        setcookie("emailid",$email,time()+60*60*24*10,"/");
                        setcookie("tpassword",$pwd,time()+60*60*24*10,"/");
                        $response['message'] = "<script>window.location='admin.php'</script>";
                    }else{
                        $response['message'] = 'Sorry ! , no record found';
                    }

                }
             }else{

                if($check==1){
                    $_SESSION['temail']=$email;
                    $response['message'] = "<script>window.location='admin.php'</script>";
                    
                }else{
                    $response['message'] = 'Sorry ! , no record found';
                    
                }



             }



        }

    }
    else
    {
        $response['message'] = 'All fields are mandatory';
    }

}
echo json_encode($response);

?>
