<?php

$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

session_start();


include '/wamp64/www/php_program/PondicherryUniversity/config.php';


if (isset($_POST['regno']) || isset($_POST['pwd']))
{

    $regno = $_POST['regno'];
    $pwd = $_POST['pwd'];
    $encryptPwd = md5($pwd);

    //  Checking empty/ not empty
    if (!empty($regno) && !empty($pwd)){

        $valid = true;

        // regno
        if (empty($_POST['regno']))
        {
            $response['status'] = 0;
            $response['message'] = 'please Enter RegNo!';
            $valid = false;
        }
        else
        {
            $regno = $_POST['regno'];
            if (!preg_match("/^([0-9]{4})$/", $regno))
            {
                $response['status'] = 0;
                $response['message'] = 'Invalid Reg No';
                $valid = false;
            }
        }

        //   password
        if (empty($_POST['pwd']))
        {
            $response['status'] = 0;
            $response['message'] = 'please Enter Password!';
            $valid = false;
        }
        else
        {
            $pwd = $_POST['pwd'];
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

             $query="SELECT * FROM std_details WHERE regno='$regno' && pwd='$encryptPwd'";
             $query_run=mysqli_query($conn,$query) or die(mysqli_error($conn));

             $check=mysqli_num_rows($query_run);

            //  remember check ----
             if(isset($_POST['remember'])){
                $remember=$_POST['remember'];

                if(!empty($remember)){
                    if($check==1){
                        setcookie("regno",$regno,time()+60*60*24*10,"/");
                        setcookie("password",$pwd,time()+60*60*24*10,"/");
                        $response['message'] = "<script>window.location='user.php'</script>";
                    }else{
                        $response['message'] = 'Sorry ! , no record found';
                    }

                }
             }else{

                if($check==1){
                    $_SESSION['regno']=$regno;
                    $response['message'] = "<script>window.location='user.php'</script>";
                    
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
