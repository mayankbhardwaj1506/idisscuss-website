<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

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
    <title>MY Profile</title>

</head>

<body class="theme">

    <span class="backbtn rounded-3" mx-1 style="position:fixed;top:1px;left:1px;"><a href="index.php"><img
                src="partials/back.svg" alt="" srcset="" width="40px"></a></span>
    <?php
    require 'partials/dbconnect.php';
    $mail = $_SESSION['username'];
    $sql = "SELECT * FROM `user_table` WHERE user_name='$mail';";

    $result = mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($result);

    $image = $row['user_dp'];
    $user_name = $row['user_name'];
    $email = $row['email'];
    $mob = $row['mobile'];
    ?>
    <div class="container">
        <div class="d-flex box container align-items-center justify-content-center flex-column border rounded-3 shadow my-5 my-lg-2 card-theme"
            style="max-width:600px">
            <h2 class=" my-4 text-center">My profile </h2>
            <?php
            echo '
            <img src="'.$image.'" class="rounded-circle" alt="" height="155px" width="155px">';
            ?>


            <label for="file_input" class="py-1 btn btn-light mt-3 border">Edit</label>

            <form method="post" action="partials/image.php" enctype="multipart/form-data">
                <input class="form-element" id="file_input" type="file" name="image" accept="image/*" hidden>
                <input type="submit" value="Upload" id="file_upload" hidden>
            </form>

            <form action="partials/profile_update.php" method="post" style="width:100%"
                class="d-flex flex-column align-items-center justify-content-center">
                <div class="col-md-10 col-11 my-1">
                    <label for="validation01" class="form-label mb-1">Username</label>
                    <input type="text" name="uname" class="form-element" id="validation01"
                        value="<?php echo $user_name; ?>" required>

                </div>
                <div class="col-md-10 col-11 my-1">
                    <label for="validation02" class="form-label mb-1">Email i'd</label>
                    <input type="email" name="email" class="form-element" id="validation02"
                        value="<?php echo $email; ?>" required>

                </div>
                <div class="col-md-10 col-11 my-1">
                    <label for="validation03" class="form-label mb-1">Phone Number</label>
                    <input type="text" name="mob" class="form-element" id="validation03" maxlength="10"
                        inputmode="numeric" value="<?php echo $mob; ?>">

                </div>
                <div class="col-md-10 col-11 my-1">
                    <label for="validation04" class="form-label mb-1">Password</label>
                    <input type="password" name="pass" class="form-element" id="validation04" maxlength="10"
                        placeholder="**********">

                </div>
                <div class="col-md-10 col-11 my-5">

                    <input type="submit" class="form-control btn-primary" id="validation05" value="Update">

                </div>
            </form>
        </div>
    </div>




    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="max-width:460px">
            <div class="modal-content card-theme">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Profile photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="partials/image_upload.php" method="post">
                        <?php
                        $folder = $_GET['image'];
                        echo '
                        <center>
                            <img src="'.$folder.'" class="rounded-circle" alt="wait" height="300px" width="300px">
                        </center>
                        <input type="hidden" name="file" value="'.$folder.'">';
                        ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>










    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <?php 

if(isset($_GET['image'])){
    echo "<script>var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();</script>";
} else {
    echo "<script>var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.hide();</script>";
}
?>
    <script>
    document.getElementById("file_input").onchange = function() {
        document.getElementById("file_upload").click();
    }
    </script>
    <script>

    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="partials/script.js"></script>
    <script src="partials/script2.js"></script>
</body>

</html>

<?php 
} else {
    header('location:index.php');
}?>