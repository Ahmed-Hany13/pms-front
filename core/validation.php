<?php


function validateRequire($inputName, $value)
{
    return empty($value) ? "$inputName is required" : null;
}

function validateName($name)
{
    if (strlen($name) < 3) {
        return "name must be at least 3 characters";
    } elseif (strlen($name) > 20) {
        return "name must be at most 20 characters";
    }
}
function validateEmail($email)
{
    return !filter_var($email, FILTER_VALIDATE_EMAIL) ? "Invalid Email" : null;
}

function validateMessage($message)
{
    $count = 0;
    $character = " ";
    for ($i = 0; $i <= strlen($message); $i++) {
        if ($message[$i] == $character) {
            $count++;
        }
    }
    return $count >= 49 ? "message must be less than 50 words" : null;
}

function validatePassword($password)
{
    if (strlen($password) < 6) {
        return "Password must be at least 6 characters";
    } elseif (strlen($password) > 45) {
        return "Password must be at most 45 characters";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return "password must contain uppercase";
    }
    if (!preg_match("/[a-z]/", $password)) {
        return "password must contain lowercase";
    }
    if (!preg_match("/[0-9]/", $password)) {
        return "password must contain numbers";
    }
}

function validateEmailUnique($email)
{
    $usersJsonFile = realpath(__DIR__ . "/../data/users.json");
    $users = file_exists($usersJsonFile) ? json_decode(file_get_contents($usersJsonFile), true) : [];

    foreach ($users as $user) {
        if ($email === $user['email']) {
            return "Email already exist";
        } else {
            return null;
        }
    }
}

function validateContact($name, $email, $message)
{
    $fields = [
        "name" => $name,
        "email" => $email,
        "message" => $message,
    ];
    foreach ($fields as $input_name => $value) {
        if ($error = validateRequire($input_name, $value)) {
            return $error;
        }
    }
    if ($error = validateName($name)) {
        return $error;
    }
    if ($error = validateEmail($email)) {
        return $error;
    }
    if ($error = validateMessage($message)) {
        return $error;
    }
}
function validateRegister($name, $email, $password)
{
    $fields = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
    ];
    foreach ($fields as $input_name => $value) {
        if ($error = validateRequire($input_name, $value)) {
            return $error;
        }
    }
    if ($error = validateName($name)) {
        return $error;
    }
    if ($error = validateEmail($email)) {
        return $error;
    }
    if ($error = validateEmailUnique($email)) {
        return $error;
    }
    if ($error = validatePassword($password)) {
        return $error;
    }
}

function validateLogin($email, $password)
{
    $list = [
        "email" => $email,
        "password" => $password
    ];
    foreach ($list as $input_name => $value) {
        if ($error = validateRequire($input_name, $value)) {
            return $error;
        }
        if ($error = validateEmail($email)) {
            return $error;
        }
    }
}
function validateAddProduct($name, $description ,$image)
{
    $list = [
        "name" => $name,
        "description" => $description,
        // "image" => $image,
    ];
    foreach ($list as $input_name => $value) {
        if ($error = validateRequire($input_name, $value)) {
            return $error;
        }
    }
    if ($error = validateName($name)) {
        return $error;
    }
}
