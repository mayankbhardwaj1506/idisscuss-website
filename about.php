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

    <title>About-iDiscuss</title>

    <link id="themes-link" rel="stylesheet" href="partials/style.css">

</head>

<body class="card-theme">
    <?php require 'partials/header.php'; ?>
    <?php require 'partials/login2.php'; ?>
    <?php require 'partials/signup2.php'; ?>



    <div class="container py-4 ">
        <div class="container px-5 ">
            <h2 class="mb-4">About Us</h2>

            <p class=" fs-5 fw-">Welcome to CodeTalk Forum — your go-to community for all things programming!</p>

            <P class=" fs-5 fw-">We created CodeTalk with one mission in mind: to build a space where developers, from
                beginners to
                seasoned professionals, can connect, collaborate, and grow together through shared knowledge of coding
                languages.</P>

            <p class=" fs-5 fw-">Whether you're debugging your first Python script, comparing Java frameworks,
                optimizing C++ code, or
                diving into newer languages like Rust or Kotlin — this is the place to ask questions, offer advice, and
                explore the latest trends in software development.</p>

            <h3 class="my-4">What You'll Find Here:</h3>

            <ul>
                <li class=" fs-5 fw-"> 💬 Active Discussions on a wide range of programming languages and tools</li>
                <li class=" fs-5 fw-"> 📚 Helpful Tutorials and resources shared by members</li>
                <li class=" fs-5 fw-"> 🧩 Problem-Solving Threads for real-world coding challenges</li>
                <li class=" fs-5 fw-"> 🤝 Peer Support in a respectful, inclusive environment</li>
                <li class=" fs-5 fw-"> 🛠️ Project Showcases to inspire and get feedback</li>
            </ul>

            <h3 class="my-4"> Why Join Us?</h3>

            <p class=" fs-5 fw-">We believe learning to code (and continuing to grow in your coding journey) shouldn't
                be done in
                isolation. Our community fosters a collaborative atmosphere where asking questions is encouraged, and
                helping others is celebrated.</P>

            <p class=" fs-5 fw-">Whether you're here to learn, teach, or simply geek out about your favorite language —
                welcome aboard!
            </P>

            <hr class="my-4">

            <p class=" fs-5 fw-">Start exploring the forums, introduce yourself, and dive into the code!</P>
            <P class=" fs-5 border-bottom-0">Got suggestions or ideas for improvement?<a href="contact.php">[Contact
                    us]</a> or drop by the Feedback section.</P>

            <hr class="my-4">

            <P class=" fs-5 fw-">Let me know if you want a version tailored to a specific theme (e.g., just web
                development, data science,
                etc.) or a more casual or technical tone.</P>

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
    <?php

    ?>

</body>



</html>