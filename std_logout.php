<?php
session_start();

if(isset($_SESSION['regno'])){
   
    session_destroy();
    session_unset();
    header("Location:index.php");
}else{
    if(isset($_COOKIE['regno']) || isset($_COOKIE['pwd'])){
        $regno=$_COOKIE['regno'];
        $pwd=$_COOKIE['pwd'];

        setcookie("regno",$regno,time() - 3600);
        setcookie("password",$pwd,time() - 3600);
        header("Location:index.php");
    }
}


?>