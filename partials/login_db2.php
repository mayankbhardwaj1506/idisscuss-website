<?php
session_start();
$_SESSION['loggedin']="";

?>
<?php
require "dbconnect.php";
$alert=false;
$error=false;

if($_SERVER['REQUEST_METHOD']=='POST') {
    $mail = $_POST['email'];
    $password = $_POST['passward'];
    
    $check = true;

    $mail = str_replace('select','S',$mail);
    $mail = str_replace('delete','d',$mail);
    $mail = str_replace('update','u',$mail);
    $password = str_replace(' Or ','or',$password);

    $sql = "SELECT * FROM `user_table` WHERE email= '$mail' Or user_name='$mail';";

    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)==1){
        if($row['varification']==1) {
            
            $user= $row['user_name'];
            $image=$row['user_dp'];
            if(password_verify($password,$row['password'])){

                
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                $_SESSION['image'] = $image;

                  
                echo "yes";
                // echo "<script>
                //         window.history.forward();
                //     </script>" ;
                //  header('location:'.$_SERVER['HTTP_REFERER']);

               
            } else {
                echo "Password_not_found";
            }
        } else {
            echo "not_varified";
        }
    } else {
        echo "not_exist";
    }
}
    
    // header('location:'.$_SERVER['HTTP_REFERER']);
?>