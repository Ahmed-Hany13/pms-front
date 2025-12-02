<?php
include "../../core/validation.php";
include "../../core/function.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST['name']);
    $name = htmlspecialchars($name);
    $email = $_POST['email'];
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $error = validateRegister($name,$email,$password);

    if(!empty($error)){
        Set_Session($error , "danger");
        header("Location: ../../register.php");
        exit;
    }
    if (registerUser($name,$email,$password)){
        $_SESSION['auth'] = [
            "name" => $name,
            "email" => $email,
        ];
        Set_Session("successful register" , "success");
        header("Location: ../../index.php");
        exit;
    }
}