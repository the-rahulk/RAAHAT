<?php

include('config.php');


if(isset($_POST['signup-btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];

    $checkemail= "SELECT email FROM users WHERE email = '$email' ";

    $checkemail_run = mysqli_query($con, $checkemail);

    if(mysqli_num_rows($checkemail_run)>0) {
            //Already Exists
        echo '<script>alert("Email ID alredy exist.")</script>';
        header("location: index.html");
        exit;
    }
    else {

        $user_query = "INSERT INTO users (name, email, phone_no, password) VALUES ('$name','$email','$phone','$hash')";

        $user_query_run = mysqli_query($con, $user_query);

            if($user_query_run) {
                echo '<script>alert("Sign Up Succesfull, Proceed to Login.")</script>';
                header("location: index.php");
            } else {
                echo '<script>alert("User Registration Failed")</script>';
                header("location: index.php");
            }
        
    }
}

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];

    

    $log_query = "SELECT * FROM users WHERE email= '$email' LIMIT 1";

    $log_query_run = mysqli_query($con, $log_query);

    if(mysqli_num_rows($log_query_run) > 0) {
        foreach($log_query_run as $row) {
            $user_id =$row['id'];
            $user_name =$row['name'];
            $user_email =$row['email'];
            $user_phone = $row['phone_no'];
            $user_password = $row['password'];
        }  

        if(password_verify($password, $user_password)){

            session_start();

            $_SESSION['auth']= 1;

            echo $user_email;

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_phone'] = $user_phone;
        
            $_SESSION['auth_user'] = [
                'user_id'=>$user_id,
                'user_name'=>$user_name,
                'user_email'=>$user_email,
                'user_phone' =>$user_phone
            ]; 

            $_SESSION['status']= "Logged In Successfully";
            echo '<script>alert("Logged In Successfully")</script>';
            header('location: ../index.php');
        }
        else {
            echo '<script>alert("Invalid Email or Password")</script>';
            header('location: index.php');
        }
       
    }
    else {
        echo '<script>alert("Invalid Email or Password")</script>';
        header('location: index.php');
    }
}

?>