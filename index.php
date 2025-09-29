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

    <title>iDiscuss</title>

</head>

<body style="margin:0;padding:0" class="theme">

    <?php require 'partials/header.php'; ?>
    <?php require 'partials/signup2.php'; ?>
    <?php require 'partials/login2.php'; ?>
    <?php require 'partials/logoutmodal.php'; ?>
    <?php include 'partials/slider.php'; ?>

    <div class="container my-4 ">
        <h1 class="text-center my-4">iDiscuss, Browse Categories</h1>

        <div class="row ">
            <?php 
        require "partials/dbconnect.php";

        $sql = "select * from `catagory`";

        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)) {
            $srno = $row['srno'];
            $title = $row['catagroyname'];
            $desc = $row['catagroydisc'];

            echo '<div class="col my-3 d-flex justify-content-center">
                    <div class="transform card-theme shadow rounded-3" style="width: 18rem;">
                        <img src="partials/'.$srno.'.avif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$title.'</h5>
                            <p class="card-text">'.substr($desc,0,80).'...</p>
                            <a href="threadlist.php?cid='.$srno.'" class="btn btn-success">View threads</a>
                        </div>
                    </div>
                </div>';
        }
    ?>
        </div>
    </div>
    <?php
    $theme=false;
     require 'partials/footer.php'; ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="partials/script.js">
    </script>
    <script src="partials/script2.js">
    </script>


</body>

</html>