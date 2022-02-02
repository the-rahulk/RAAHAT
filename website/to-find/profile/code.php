<?php

    include('config.php');

    if(isset($_POST['submit'])){

    $uid = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $location = $_POST['location']; 
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $image_name = $_FILES['image']['name'];
    $image_size = $FILES['image']['size '];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

        if($error === 0) {

            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                //INSERT INTO DATABASE
                
                $post_query = "INSERT INTO post (uid, name, age, gender, location, phone, message, image_url) VALUES ('$uid','$name','$age','$gender', '$location', '$phone', '$message', '$new_img_name')";

                $post_query_run = mysqli_query($con, $post_query);
            
                    if($user_query_run) {
                        echo '<script>alert("Posted Successfully.")</script>';
                        header("location: ../index.php");
                    } else {
                        echo '<script>alert("User Registration Failed")</script>';
                        header("location: index.php");
                    }
            


            }else{
                $em = "Wrong File";
                header("Location: create.php?error=$em");
            }

        }else{
            $em = "Unknown error occured!";
        }
    
    }

    if(isset($_POST['update'])) {

        $uid = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    
        $query = "UPDATE users SET name='$name', email='$email', phone_no='$phone' WHERE id = '$uid' ";
    
        $query_run = mysqli_query($con, $query);
    
        if($query_run) {
            $_SESSION['status'] = "User details Updated Successfully";
            header("location: index.php");
        } else {
            $_SESSION['status'] = "Update Failed";
            header("location: update.php");
        }
    
    }
    
    if(isset($_POST['logout_btn'])) {

        //session_destroy();
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);

        $_SESSION['status'] = "Logged Out Successfully";
        header('location: ../register/index.php');
        exit(0);
    }


?>