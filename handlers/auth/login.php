<?php 

include "../../core/function.php";
include "../../core/validation.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $error = validateLogin($email,$password);

    if(!empty($error)){
        Set_Session($error , "danger");
        header("Location: ../../login.php");
        exit;
    }
    if (loginUser($email,$password)){
        Set_Session("successful Login" , "success");
        header("Location: ../../profile.php");
        exit;
    }
}