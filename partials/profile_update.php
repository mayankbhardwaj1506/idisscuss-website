<?php

session_start();
require "dbconnect.php";
$alert=false;
$error=false;

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

    $user = $_SESSION['username'];

    if($_SERVER['REQUEST_METHOD']=='POST') {
        // $mail = $_POST['email'];
        $uname = $_POST['uname'];
        $password = $_POST['pass'];
        $mob = $_POST['mob'];

        $sql = "SELECT * FROM `user_table` WHERE user_name='' AND email='';";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==0){
            if(strlen($uname)>=5){
                if(ctype_lower($uname)){
                    if(strlen($password)>=4) {
                        $hash= password_hash($password,PASSWORD_DEFAULT);
                        $sql = "UPDATE `user_table` SET `password` = '$password' WHERE `user_table`.`user_name` = '$user';";
                    }
                    
                        $sql = "UPDATE `user_table` SET `user_name` = '$uname',`mobile`= '$mob' WHERE `user_table`.`user_name` = '$user';";

                        $result = mysqli_query($conn,$sql);

                         $_SESSION['username'] = $uname;
                        header('location:../profile.php?alert=SignUp');

                } else {
                        $error = true;
                        header('location:../profile.php?error=Username_inlowercase');
                }
            } else {
                $error = true;
                header('location:../profile.php?error=Username_is_too_small');
            }
        } else {
                $error = true;
                header('location:../profile.php?error=User_name_already_exists');
        }
    }
} else {
    header('location:../index.php');
}

?>