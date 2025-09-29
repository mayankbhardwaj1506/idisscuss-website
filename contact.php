<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link id="themes-link" rel="stylesheet" href="partials/style.css">
    <title>Contact-idiscuss</title>
</head>

<body class="theme">
    <?php require 'partials/header.php'; ?>
    <?php require 'partials/login2.php'; ?>
    <?php require 'partials/signup2.php'; ?>
    <?php require 'partials/dbconnect.php'; ?>
<?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $mail = $_POST['email'];
            $subject = $_POST['subject'];
            $massage = $_POST['massage'];
            $sql="INSERT INTO `contacts` ( `email`, `subject`, `massage` ) VALUES ('$mail', '$subject', '$massage')";

            $result = mysqli_query($conn,$sql);

            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Submit Successfully !</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
            }
        }
            

            
        
    ?>
    <div class="container p-2 my-4 theme" style="max-width:550px">
    <div class="container box border rounded-3 shadow  card-theme" >
        <div class="class my-4">
        <h2 class="text-center" >Contact Us</h2>
        <form class="row align-items-center justify-content-center g-3 my-1" method="post" action="contact.php">
            
          <div class="col-md-10 col-11">
                <label for="name" class="form-label">Name</label><br>
                <input type="text" class="form-element card-theme " id="inputAddress2" placeholder="" >
            </div>
            <div class="col-md-10 col-11">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-element card-theme" id="inputEmail4">
            </div>
            <div class="col-md-10 col-11">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-element card-theme" id="inputPassword4">
            </div>

            <div class="col-md-10 col-11">
                <label for="Subject" class="form-label">Subject</label>
                <input type="text" name="subject" class="form-element card-theme" id="inputAddress2" placeholder="">
            </div>
            <div class="col-md-10 col-11">
                <label for="Massage" class="form-label">Massage</label>
                <textarea class="form-element card-theme" name="massage" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            
            <div class="col-md-10 mb-4 col-11">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
    </div>
</div>
    <?php require 'partials/footer.php'; ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="partials/script.js"></script>
    <script src="partials/script2.js"></script>
</body>

</html>