<?php

  include('config.php');
  session_start();

  if(isset($_SESSION['auth_user'])){
    $id = $_SESSION['user_id'];
  } else {
    echo '<script> alert("NO USER FOUND") </script>';
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed | RAAHAT</title>
    <link rel="stylesheet" href="style.css" class="stlesheet">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
   <!-- navbar section  -->

    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <a href="../index.html">R<span>AA</span>H<span>A</span>T</a>
            </div>
            <ul class="menu">
                <li><a href="../index.html">Home</a></li>
                <li><a href="index.php">Feed</a></li>
                <li><a href="how-it-works/index.html">How it works?</a></li>
                <li><a href="profile/index.php">Profile</a></li>

                <?php 
                    if(!isset($_SESSION['auth_user'])){
                ?>
                    <li><a href="#">SignIn/SignUp</a></li>
                <?php } else { ?>
                    <li>
                <!-- <li><a href="#">SignOut</a></li> -->
                <form action="profile/code.php" class="signoutform" method="POST">
                  <button type="submit" name="logout_btn" class="sign-out">SignOut</button>
                </li>
                <?php } ?>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <div class="space">

    </div>

    <div class="page-title">
        <h1><i>Feed</i></h1>
        <hr>
    </div>


        <?php
            $query = "SELECT * FROM post ORDER BY id DESC";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0) {
                foreach($query_run as $row) {
        ?>
    <div class="container">
        <div class="blogpost">
            <div class="blogpost_img">
                <img src="profile/uploads/<?= $row['image_url']?>" alt="">
            </div>
            <div class="blogpost_info">
                <!-- <h1 class="blogpost_title"  </h1> -->
                <h3 style="font-size:40px; color: crimson; "> <?php echo $row['name'] ?> </h3>
                    <br><br>
                <h3>Age:</h3>
                <p><?php echo $row['age']; ?></p>
                <!-- <h3>Gender:</h3>
                <p><?php // echo $row['gender']; ?></p> -->
                <h3>Last Known Location:</h3>
                <p><?php echo $row['location']; ?></p>
                <h3>If found Contact</h3>
                <p><?php echo $row['phone']; ?></p>
                <h3>More Information</h3>
                <p><?php echo $row['message']; ?></p>
                
            </div>
                </div>
            <?php
                    }
   
                } else {
            ?>
                No Record Found
            <?php
                }
            ?>
        
        

    <script src="script.js"></script>
</body>
</html>