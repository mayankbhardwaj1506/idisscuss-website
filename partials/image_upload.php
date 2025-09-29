<?php
session_start();

require "dbconnect.php";
$alert=false;
$error=false;

$mail = $_SESSION['username'];

if($_SERVER['REQUEST_METHOD']=='POST') {
    // $mail = $_POST['email'];
    // $uname = $_POST['uname'];
    // $password = $_POST['password'];
    // $cpassword = $_POST['cpassword'];
    $image = $_POST['file'];

    // $sql = "SELECT * FROM `user_table` WHERE user_name='$uname' OR email='$mail';";
    // $result = mysqli_query($conn,$sql);

    // if(mysqli_num_rows($result)==0){
    //     if(strlen($uname)>=5){
    //         if(ctype_lower($uname)){
    //             if($password==$cpassword) {
                
                    // $hash= password_hash($password,PASSWORD_DEFAULT);
                    $sql = "UPDATE `user_table` SET `user_dp` = '$image' WHERE `user_name` = '$mail';";

                    $result = mysqli_query($conn,$sql);

                    $_SESSION['image'] = $image;
                    header('location:../profile.php');

//                 } else {
//                     $error = true;
//                     header('location:../home.php?error=Passward_not_match');
//                 }
//             } else {
//                     $error = true;
//                     header('location:../home.php?error=Username_inlowercase');
//             }
//         } else {
//             $error = true;
//             header('location:../home.php?error=Username_is_too_small');
//         }
    } else {
        $error = true;
        header('location:../index.php');
    }

?>