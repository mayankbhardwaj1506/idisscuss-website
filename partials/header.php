<?php


echo '<nav class="navbar navbar-expand-lg navbar-dark header-theme" id="navbar">
        <div class="container-fluid">
        <a class="navbar-brand header-theme navbar" href="index.php">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link active header-theme" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link header-theme" href="about.php">About Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle header-theme" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu header-theme" aria-labelledby="navbarDropdown">';
?>

<?php
          
  require "partials/dbconnect.php";

  $sql = "select * from `catagory`";
  $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_assoc($result)) {
      $srno = $row['srno'];
      $title = $row['catagroyname'];

              echo '<li><a class="dropdown-item card-theme" href="threadlist.php?cid='.$srno.'">'.$title.'</a></li>';
  }
        
      // <li><a class="dropdown-item" href="#">Action</a></li>
      // <li><a class="dropdown-item" href="#">Another action</a></li>
      // <li><hr class="dropdown-divider"></li>
      // <li><a class="dropdown-item" href="#">Something else here</a></li>
              echo '</ul>
            </li>
            <li class="nav-item">
              <a class="nav-link header-theme" href="contact.php" > Contact Us</a>
            </li>
          </ul>';

          


          echo '
            <form class="d-flex my-2 my-lg-0 me-3" method="GET" action ="search.php">
              <input class="form-control me-2 card-theme" name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" type="submit">Search</button>
            </form>';

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

        $image=($_SESSION['image']);

        echo '
        <div class="dropdown d-flex">
          <a class="me-2 ps-0 ps-lg-4 pe-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="'.$image.'" class="rounded-circle" width="37px" height="37px" alt="...">
          </a>
          
        <div class="header-theme my-0 py-2 pe-2">'.$_SESSION["username"].'</div>
        
        
          <ul class="dropdown-menu card-theme" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item card-theme" href="profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item card-theme" href="#" onclick="defaultTheme()" >▼ Theme (default)</a></li>
            <li><a class="dropdown-item bg-light text-dark" href="#" onclick="lightTheme()">Light</a></li>
            <li><a class="dropdown-item bg-dark text-light" href="#" onclick="darkTheme()">Dark</a></li>

            <li><hr class="dropdown-divider"></li>
            <li><a href=""><button class="btn btn-primary mx-2" onclick="logout()">LogOut</button></a></li>
          </ul>
        
        </div>';
      

      } else {
        echo '
      <div class=" my-lg-0 ">
      <button class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button class="btn btn-outline-success ms-1" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
      </div> ';
      }

    echo '
    </div>
  </div>
</nav>';
?>
