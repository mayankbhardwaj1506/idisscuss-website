<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_FILES['image'])) {
        $imagefile = $_FILES["image"];

        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];

        $folder = "../images/".$file_name;

        move_uploaded_file($temp_name,$folder);

        $image=substr($folder,3,);
        header("location:../profile.php?image=".$image);
        
        
    } else {
        header("location:../profile.php");
    }
}
?>