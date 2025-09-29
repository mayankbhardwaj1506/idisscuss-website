<?php
require "dbconnect.php";
$alert=false;
$error=false;

if($_SERVER['REQUEST_METHOD']=='POST') {
    $mail = $_POST['email'];
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_otp = $_POST['otp'];

    $mail = str_replace('select','S',$mail);
    $mail = str_replace('delete','d',$mail);
    $mail = str_replace('update','u',$mail);
    $uname = str_replace('select','S',$uname);
    $uname = str_replace('delete','d',$uname);
    $uname = str_replace('update','u',$uname);
    $password = str_replace(' Or ','or',$password);

    if(isset($_POST['otp']) && $_POST['otp']==true){

                        $sqls = "SELECT varification FROM `user_table` WHERE user_name='$uname' OR email='$mail';";
                        $results = mysqli_query($conn,$sqls);
                        $rows=mysqli_fetch_assoc($results);

                        $otp=$rows['varification'];

                        if( $otp==$user_otp ){
                        
                        $sqls = "UPDATE `user_table` SET `varification` = '1' WHERE `user_name` = '$uname';";

                        $result = mysqli_query($conn,$sqls);

                        echo "yes";
                        } else {
                            echo "invalid_otp";
                        }
                    } else {


    $sql = "SELECT * FROM `user_table` WHERE user_name='$uname' OR email='$mail';";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    
    if(mysqli_num_rows($result)==0 || $row['varification']!=1){

        if(isset($row['varification'])){
        if($row['varification']!=1){
            $sql = "DELETE FROM `user_table` WHERE user_name='$uname' OR email='$mail';";
            $result = mysqli_query($conn,$sql);
        }
        }
        if(strlen($uname)>=5){
            // if(ctype_lower($uname)){
                if($password==$cpassword) {
                    
                    if($user_otp==""){
                       
                        $OTP = mt_rand(1000,9999);
                        $to="$mail";
                        $subject="idisscuss account varification";
                        $massage="Your idisscuss account varifiaction code is ".$OTP;
                        $header="From:idisscuss.page.gd";

                        $check = mail($to,$subject,$massage,$header);

                        if($check){
                            echo "otp_send";

                            $hash= password_hash($password,PASSWORD_DEFAULT);
                            $sql = "INSERT INTO `user_table` (`user_name`, `email`,`varification`, `password`, `dt`) 
                            VALUES ('$uname', '$mail','$OTP', '$hash', current_timestamp());";
                            $result = mysqli_query($conn,$sql);

                        } else {
                            echo "invalid_email";
                        }
                    
                    } 
                    
                } else {
                    echo "password_not_match";
                }
            // } else {
            //         echo "username_inlower";
            // }
        } else {
            echo "username_small";
        }
    } else {
         
            
            if($mail==$row['email']){
                echo "email_exists";
            } else {
                echo "username_exists";
            }
    
    }
                        

}}
?>