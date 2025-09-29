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
    <?php require 'partials/login2.php'; ?>
    <?php require 'partials/signup2.php'; ?>
    <?php include 'partials/alert_error.php'; ?>


    <?php 
        require "partials/dbconnect.php";

        $srno = $_GET['cid'];

        $sql = "select * from `catagory` where `srno`='$srno'";

        $result = mysqli_query($conn,$sql);

        if ($result){
            $row = mysqli_fetch_assoc($result);
            $cat_title = $row['catagroyname'];
            $cat_desc = $row['catagroydisc'];
        }
        ?>

    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
        $srno = $_GET['cid'];
        $thread_user = $_SESSION['username'];
        if($_SERVER['REQUEST_METHOD']=='POST'){

        $thread_title = $_POST['title'];
        $thread_desc = $_POST['desc'];

        $thread_title = str_replace('>','&gt',$thread_title);
        $thread_title = str_replace('<','&lt',$thread_title);

        $thread_desc = str_replace('>','&gt',$thread_desc);
        $thread_desc = str_replace('<','&lt',$thread_desc);

        $sql = "INSERT INTO `threads` (`thread_name`, `thread_desc`,`thread_by`, `forum_id`, `time_stamp`) 
        VALUES ('$thread_title', '$thread_desc','$thread_user', '$srno', current_timestamp());";

        $result = mysqli_query($conn,$sql);
        
        $alert = false;
        if ($result){
           $alert = " Your thread is upload successfully ."; 
        }

        include 'partials/alert.php';
    }
}
?>


    <div class='container my-4 theme'>
        <div class="p-5 mb-4 border rounded-3 card-theme">
            <div class="container-fluid py-3 ">
                <h1 class="display-5 ">Welcome to <?php echo $cat_title; ?> Forum.</h1>
                <p class="col-md-12 fs-5 my-3"> <?php echo $cat_desc; ?></p>

                <hr class="my-4">
                <button class="btn btn-success btn-lg" type="button" data-bs-toggle="collapse"
                    data-bs-target="#questionExample" aria-expanded="false" aria-controls="questionExample">Ask your
                    question</button>
            </div>
        </div>
    </div>
    <?php

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

        echo '<div class="container ">
        <div class="collapse " id="questionExample">
            <div class="card card-body card-theme">
                <div class="container px-4">
                    <h2>Start a Discussion</h2>
                    <!-- <form method = POST action="partials/ques.php?cid=<?php echo $srno ?>"> -->
    <form method=POST action="'.$_SERVER["REQUEST_URI"].'">
        <div class="my-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Problem Title</label>
                <input type="text" name="title" class="form-element" id="exampleFormControlInput1" placeholder="Title">
                <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Ellaborate Your
                    Concern</label>
                <textarea class="form-element" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>';


    } else {
    echo '<div class="container">
        <div class="collapse " id="questionExample">
            <div class="card card-body card-theme">
                <div class="container px-4">
                    <h5> To start Discussion, Please <a href="" data-bs-toggle="modal"
                            data-bs-target="#loginModal">Login </a>. </h5>
                </div>
            </div>
        </div>
    </div>';
    }

    ?>


    <div class='container my-4' style="min-height:250px">
        <h1 class="display-6 my-4">Browse Questions </h1>

        <?php 
        require "partials/dbconnect.php";

        $sql2 = "select * from `threads` where forum_id = $srno";
        $result2 = mysqli_query($conn,$sql2);

        $no_thread = true;
        if ($result2){

           while( $row2 = mysqli_fetch_assoc($result2)){
            $no_thread = false;
            $thread_id = $row2['thread_id'];
            $thread_title = $row2['thread_name'];
            $thread_desc = $row2['thread_desc'];
            $thread_time = $row2['time_stamp'];
             $user_name = $row2['thread_by'];

            $sql = "SELECT * FROM `user_table` WHERE user_name='$user_name';";

    $result = mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)==0){
        $image="images/user.webp";
    }
    else{
    $image = $row['user_dp'];
    }
    
            echo '<div class="d-flex align-items-center my-4">
            <div class="flex-shrink-0">
                <img src="'.$image.'" width="55px" height="55px" class="rounded-circle" alt="...">
            </div>
            
            <div class="flex-grow-1 ms-3">
            <a href = thread.php?threadid='.$thread_id.'>   <h5>'.$thread_title.'</h5> </a>
                '.$thread_desc.'
            </div>
        
        </div>';
           }
            
        }
        
        if($no_thread){
        echo '<div class="col-md-12 "> 
        <div class="h-100 p-5 bg-body-tertiary border rounded-3 card-theme"> 
        <p class="display-6">No Threads found.</p> 
        <p > Be the first person to ask a question.</p>
        
        </div> 
        </div>';

        }
        ?>

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