<?php

include "../../core/validation.php";
include "../../core/function.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $message = htmlspecialchars(trim($_POST['message']));
    $error = validateContact($name, $email, $message);

    if (!empty($error)) {
        Set_Session($error, "danger");
        header("Location: ../../contact.php");
        exit;
    }
    if (messageSent($name, $email, $message)) {
        Set_Session("Message sent successfully", "success");
        header("Location: ../../index.php");
        exit;
    }
}
