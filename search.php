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

<body class="theme">
    <?php require 'partials/login2.php'; ?>
    <?php require 'partials/header.php'; ?>
    <?php require 'partials/signup2.php'; ?>


    <div class="container my-4" style="min-height:79vh">
        <h3>Search results for <em>"<?php echo $_GET['search'];?>"</em></h3>

        <?php 
        require "partials/dbconnect.php";
        $search = $_GET['search'];
        $no_thread = true;

        
        
        $sql = "select * from `threads` where match( thread_name,thread_desc) against('$search') ";
        $result = mysqli_query($conn,$sql);

        
        if ($result){

           while( $row = mysqli_fetch_assoc($result)){
            $no_thread = false;
            $thread_id = $row['thread_id'];
            $thread_title = $row['thread_name'];
            $thread_desc = $row['thread_desc'];
           

            echo '<div class="d-flex  my-4">
                    <div class="flex-shrink-0 me-2">
                        <img src="partials/search.jpg" width="55px" alt="...">
                    </div>
            
                    <div class="flex-grow-1 fs-6">
                        <a href = thread.php?threadid='.$thread_id.'>   <h6>'.$thread_title.'</h6> </a>
                        '.$thread_desc.'
                    </div>
                 </div>';
                }

        
            if($no_thread){
                echo '<div class="col-md-12 my-4"> 
                    <div class="h-100 p-5 bg-body-tertiary card-theme border rounded-3"> 
                        <p class="display-6">No result found.</p> 
                        <p> Your search did not match any documents.</p>
                
                    </div> 
                    </div>';
                }
           }
        

        ?>

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