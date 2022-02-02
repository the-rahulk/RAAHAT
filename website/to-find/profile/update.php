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
    <link rel="stylesheet" href="updatestyle.css" class="stlesheet">
    <title>Update Profile | RAAHAT</title>
</head>
<body>
    <?php

      if(isset($_GET['id'])) {

        $hospital_id = $_GET['id'];
        $query = "SELECT * FROM users WHERE ID='$id' LIMIT 1";
        $query_run= mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
     ?>

<div class="container">
    <div class="title">Update Profile</div>
    <div class="content">
      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          <input type="text" value = <?php echo $id ?> name="id" hidden>
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter the name" name="name" value="<?php echo $row['name'] ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email Id</span>
            <input type="text" placeholder="Enter the Email Id" name="email" value="<?php echo $row['email'] ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter the number" name="phone" value="<?php echo $row['phone_no'] ?>" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="update" value="Update Profile">
        </div>
        <div class="button">
          <input type="submit"  value="Back">
        </div>
      </form>
    </div>
  </div>

  <?php
        }
      }   else {
        echo " <h4>No Records Found.</h4> ";
      }
    }
  ?>

</body>
</html>