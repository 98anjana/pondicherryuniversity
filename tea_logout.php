<?php
session_start();

if(isset($_SESSION['temail'])){
   
    session_destroy();
    session_unset();
    header("Location:index.php");
}else{
    if(isset($_COOKIE['emailid']) || isset($_COOKIE['pwd'])){
        $email=$_COOKIE['emailid'];
        $pwd=$_COOKIE['pwd'];

        setcookie("emailid",$email,time() - 3600);
        setcookie("password",$pwd,time() - 3600);
        header("Location:index.php");
    }
}


?>