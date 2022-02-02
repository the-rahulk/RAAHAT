<?php

    include('config.php');

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $query = "INSERT INTO contact (name,email, phone, message) VALUES('$name', '$email', '$phone', '$message')";

        $sql = mysqli_query($con, $query) or die(mysqli_error($con));

        if($sql){
            // header("location: contact.php?msg=itworks");
            header("location: ../index.html");
        }
        else{
            header("location: contact.php?msg=doesnotwork");
        }  
    }

?>