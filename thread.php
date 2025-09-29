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

<body style="margin:0;padding:0 " class="theme">
    <?php require 'partials/header.php'; ?>
    <?php require 'partials/login2.php'; ?>
    <?php require 'partials/signup2.php'; ?>

    <?php 
        require "partials/dbconnect.php";

        $thread_id = $_GET['threadid'];
        $sql = "select * from `threads` where thread_id = $thread_id ";

        $result = mysqli_query($conn,$sql);

        if ($result){

           while( $row = mysqli_fetch_assoc($result)){
            $threadid = $row['thread_id'];
            $thread_title = $row['thread_name'];
            $thread_by = $row['thread_by'];
            $thread_desc = $row['thread_desc'];
            $thread_time = $row['time_stamp'];
           }
        }
        ?>

    <?php 
        
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
        $user= $_SESSION['username'];
        $thread_id = $_GET['threadid'];
        
        if($_SERVER['REQUEST_METHOD']=='POST'){

        $comment = $_POST['comment'];

        $comment = str_replace('>','&gt',$comment);
        $comment = str_replace('<','&lt',$comment);
        
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `commented_by`, `comment_date`) 
                                VALUES ('$comment', '$thread_id', '$user', current_timestamp());";

        $result = mysqli_query($conn,$sql);

        $alert = false;
        if ($result){
           $alert = " Your comment is upload successfully ."; 
        }

        include 'partials/alert.php'; 
    }
}
?>

    <div class='container my-4'>
        <div class="col-md-12 card-theme my-4">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                <h2><?php echo $thread_title; ?></h2>
                <p class="my-2"><?php echo $thread_desc; ?></p>
                <hr class="my-4">
                Posted By: <span class="mt-4  fs-6 fw-bold"><?php echo $thread_by ;?>
                    &nbsp&nbsp</span><?php echo $thread_time ;?>
                <div class="mt-4"><button class="btn btn-success " type="button" data-bs-toggle="collapse"
                        data-bs-target="#questionExample" aria-expanded="false" aria-controls="questionExample"> Comment
                    </button></div>
            </div>
        </div>

        <!-- <div class="p-4 mb-4 bg-light border rounded-3">
            <div class="container-fluid py-3">
                <h1 class="display-5 "><?php echo $thread_title; ?></h1>
                <p class="col-md-12 fs-5 my-3"> <?php echo $thread_desc; ?></p>
                 <button class="btn btn-primary btn-lg" type="button">Learn More</button>
                <hr class="my-4">
                <span class="mt-4  fs-6">Posted By: Mayank &nbsp&nbsp</span><?php echo $thread_time ;?>
            </div>
        </div>-->
    </div>


    <?php

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

        echo '<div class="container">
        <div class="collapse " id="questionExample">
            <div class="card card-body card-theme">
                <div class="container px-4">
                    <h2>Add your comment</h2>

                    <!-- <form method = POST action="partials/ques.php?cid='. $srno.'"> -->
                    <form method=POST action="'.$_SERVER['REQUEST_URI'].'">
                        <div class="my-3">
                            <div class="mb-3">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                                <textarea class="form-element" name="comment" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                                <div id="emailHelp" class="form-text">Keep your Answer as short and crisp as possible.
                                </div>
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
                    <p class="my-0"> Please <a href="" data-bs-toggle="modal" data-bs-target="#loginModal" >Login </a>, To Comment. </p>
                </div>
            </div>
        </div>
    </div>';
      }

    ?>



    <div class='container my-4' style="min-height:320px">
        <h1 class="display-6 my-4">Discussion </h1>


        <?php 
        require "partials/dbconnect.php";

        $sql = "select * from `comments` where thread_id = $thread_id";

        $result = mysqli_query($conn,$sql);

        $no_comment = true;
        if ($result){

           while( $row = mysqli_fetch_assoc($result)){
            $no_comment = false;
            $comment_id = $row['comment_id'];
            $user_id = $row['commented_by'];
            $comment = $row['comment_content'];
            $comment_time = $row['comment_date'];

            $sql2 = "SELECT * FROM `user_table` WHERE user_name='$user_id';";

    $result2 = mysqli_query($conn,$sql2);

    $row2=mysqli_fetch_assoc($result2);

    if(mysqli_num_rows($result2)==0){
        $image="images/user.webp";
    }
    else{
    $image = $row2['user_dp'];
    }
            echo '<div class="d-flex align-items-center my-4">
            <div class="flex-shrink-0">
                <img src="'.$image.'" width="55px" height="55px" class="rounded-circle" alt="...">
            </div>
            
            <div class="flex-grow-1 ms-3">
              <span class ="fw-bold" >'.$user_id.'</span><span> at '.$comment_time.'</span>
               <div> '.$comment.' </div>
            </div>
        
        </div>';
           }
            
        }
        
        if($no_comment){
        echo '<div class="col-md-12 "> 
        <div class="h-100 p-5 bg-body-tertiary card-theme border rounded-3"> 
        <p class="display-6">No Comments found.</p> 
        <p > Be the first person to reply a question.</p>
        
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