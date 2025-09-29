<?php

if(isset($_GET['alert'])){
  $alert = $_GET['alert'];

  if($alert) {
  echo ' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success ! </strong> '. $alert.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}

if(isset($_GET['error'])){
  $error = $_GET['error'];
  if($error) {
    echo ' <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>warning ! </strong> '. $error.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}


?>