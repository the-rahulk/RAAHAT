<?php

include('authentication.php');
include('config/webconfig.php');

if(isset($_POST['updatePost'])) {

    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $id = $_POST['id']; 

    $query = "UPDATE post SET name='$name', age='$age', gender='$gender', location='$location', phone='$phone', message='$message' WHERE id = '$id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['status'] = "Post Updated Successfully";
        header("location: hospital.php");
    } else {
        $_SESSION['status'] = "Update Failed";
        header("location: hospital.php");
    }

}

if(isset($_POST['DeletePostbtn'])) {

    $id= $_POST['delete_id'];

    $query = "DELETE FROM post WHERE id = '$id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['status'] = "Post Deleted Successfully";
        header("location: hospital.php");
    } else {
        $_SESSION['status'] = "Deletion Failed";
        header("location: hospital.php");
    }

}


//Medical Section



if(isset($_POST['updateUser'])) {

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = $_POST['id']; 

    $query = "UPDATE users SET name='$name', email='$email', phone_no='$phone' WHERE id = '$id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['status'] = "User Details Updated Successfully";
        header("location: medical.php");
    } else {
        $_SESSION['status'] = "Update Failed";
        header("location: medical.php");
    }

}

if(isset($_POST['DeleteMedicalbtn'])) {
    $medical_id= $_POST['delete_id'];

    $query = "DELETE FROM medical_details WHERE ID= '$medical_id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['status'] = "Medical Details Deleted Successfully";
        header("location: medical.php");
    } else {
        $_SESSION['status'] = "Deletion Failed";
        header("location: medical.php");
    }

}

if(isset($_POST['check_mname'])) {

    $mname = $_POST['mname'];

    $check_medical_name= "SELECT m_name FROM medical_details WHERE m_name = '$mname' ";
    $check_medical_name_run = mysqli_query($con, $check_medical_name);

    if(mysqli_num_rows($check_medical_name_run)>0) {
        echo "Medical Name Already Exists.";    
    }
    else {
        echo "Medical Name Available";
    }
}



?>