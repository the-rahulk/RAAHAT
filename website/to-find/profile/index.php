<?php

  include('config.php');
  session_start();

  if(isset($_SESSION['auth_user'])){
    $id = $_SESSION['user_id'];
  } else {
    echo '<script>alert("NO USER FOUND")</script>';
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | RAAHAT</title>
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
        <a href="../../index.html">R<span>AA</span>H<span>A</span>T</a>
      </div>
      <ul class="menu">
        <li><a href="../../index.html">Home</a></li>
        <li><a href="../index.php">Feed</a></li>
        <li><a href="../how-it-works/index.html">How it works?</a></li>
        <li><a href="index.php">Profile</a></li>
        <?php 
                    if(!isset($_SESSION['auth_user'])){
                ?>
                    <li><a href="#">SignIn/SignUp</a></li>
                <?php } else { ?>
                    <li>
                <!-- <li><a href="#">SignOut</a></li> -->
                <form action="code.php" class="signoutform" method="POST">
                  <button type="submit" name="logout_btn" class="sign-out">SignOut</button>
                </li>
                <?php } ?>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <?php 
    $query = "SELECT * FROM users WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
      foreach($query_run as $row) {
  ?>

  <div class="container">
    <div class="wrapper">
        <div class="left">
            <img src="pro1.jpg" alt="user" width="145">
            <h4> <?php echo $row['name']; ?></h4>
            <p> <?php echo $row['email']; ?> </p>
         </div>
    

        <div class="right">
            <div class="info">
                <h3>Profile Information</h3>
                <div class="info_data">
            
                <div class="data">
                    <h4>Email Id</h4>
                    <p> <?php echo $row['email']; ?> </p>
                </div>
            
                <div class="data">
                    <h4>Contact Number</h4>
                    <p> <?php echo $row['phone_no']; ?> </p>
                </div>
                </div>
                <div class="button">
                    <a href="create.php" class="btn"> Create Post </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="update.php?id=<?php echo $id ?>" class="btn">Update Profile</a>
                 </div>
            </div>          
        </div>
    </div>
        <?php
            }
          }
        ?>

</div>

<hr>



  <script src="script.js"></script>
</body>

</html>