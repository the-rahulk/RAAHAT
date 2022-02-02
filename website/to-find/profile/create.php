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
    <link rel="stylesheet" href="createstyle.css" class="stlesheet">
    <title>Create Post | RAAHAT</title>
</head>
<body>
<div class="container">
    <div class="title">Create Post</div>
    <div class="content">
      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          <input type="text" value = <?php echo $id ?> name="id" hidden>
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter the name" name="name" required>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="text" placeholder="Enter the age" name="age" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Last Known Location</span>
            <input type="text" placeholder="Enter the last known location" name="location" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number (To Inform)</span>
            <input type="text" placeholder="Enter the number" name="phone" required>
          </div>
            <div class="input-box">
                <span class="details">Any More Information You Want To Provide</span>
                <input type="text" placeholder="Enter Information" name="message" required>
            </div>
            <div class="input-box">
                <span class="details">Upload Image</span>
                <input type="file" name="image" required> 
            </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Create Post">
        </div>
        <div class="button">
          <input type="submit"  value="Back">
        </div>
      </form>
    </div>
  </div>

</body>
</html>