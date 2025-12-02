<?php

session_start();
function Set_Session($message, $type)
{
    $_SESSION['message'] = [
        'message' => $message,
        'type' => $type,
    ];
}


function Show_Session()
{
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message']['message'];
        $type = $_SESSION['message']['type'];
        echo "<div class='alert alert-$type'>$message</div>";
        unset($_SESSION['message']);
    }
}
function messageSent($name, $email, $message)
{
    $contactFileJson = realpath(__DIR__ . "/../data/contact.json");
    $users = file_exists($contactFileJson) ? json_decode(file_get_contents($contactFileJson), true) : [];
    $new_user = [
        "name" => $name,
        "email" => $email,
        "message" => $message,
    ];
    $users[] = $new_user;
    file_put_contents($contactFileJson, json_encode($users, JSON_PRETTY_PRINT));
    return true;
}

function registerUser($name, $email, $password)
{
    $userFileJson = realpath(__DIR__ . "/../data/users.json");
    $users = file_exists($userFileJson) ? json_decode(file_get_contents($userFileJson), true) : [];
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $new_user = [
        "name" => $name,
        "email" => $email,
        "password" => $pass_hash,
    ];
    $users[] = $new_user;
    file_put_contents($userFileJson, json_encode($users, JSON_PRETTY_PRINT));
    return true;
}
function loginUser($email, $password)
{
    $userFileJson = realpath(__DIR__ . "/../data/users.json");
    $users = file_exists($userFileJson) ? json_decode(file_get_contents($userFileJson), true) : [];


    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            $_SESSION['auth'] = [
                "name" => $user['name'],
                "email" => $user['email'],
            ];
            return true;
        }
        if ($user['email'] !== $email || !password_verify($password, $user['password'])) {
            Set_Session("Invalid Email or Password", "danger");
            header("location: ../../login.php");
        }
    }
}

function addProduct($name, $description ,$price,$image)
{
    $productsFileJson = realpath(__DIR__ . "/../data/products.json");
    $products = file_exists(filename: $productsFileJson) ? json_decode(file_get_contents($productsFileJson), true) : [];
    $newId = empty($products) ? 1 : max(array_column($products, "id")) + 1;
    $new_product = [
        "id" => $newId,
        "name" => $name,
        "description" => $description,
        "price" => $price,
        "image" => $image
    ];
    $products[] = $new_product;
    file_put_contents($productsFileJson, json_encode($products, JSON_PRETTY_PRINT));
    return true;
}

function deleteProduct($id)
{
    $productsFileJson = realpath(__DIR__ . "/../data/products.json");
    $products = file_exists(filename: $productsFileJson) ? json_decode(file_get_contents($productsFileJson), true) : [];

    $flag = false;
    foreach ($products as $index => $product) {
        if ($product['id'] == $id) {
            unset($products[$index]);
            $flag = true;
            break;
        }
    }
    if ($flag === false) {
        return false;
    }
    $products = array_values($products);
    file_put_contents($productsFileJson, json_encode($products, JSON_PRETTY_PRINT));
    return true;
}

function getProducts()
{
    $productsFileJson = realpath(__DIR__ . "/../data/products.json");
    $products = file_exists(filename: $productsFileJson) ? json_decode(file_get_contents($productsFileJson), true) : [];

    return $products;
}
function getUsers()
{
    $userFileJson = realpath(__DIR__ . "/../data/users.json");
    $users = file_exists(filename: $userFileJson) ? json_decode(file_get_contents($userFileJson), true) : [];

    return $users;
}
function updateProduct($id, $name, $description, $price, $image)
{
    $productsFileJson = realpath(__DIR__ . "/../data/products.json");
    $products = file_exists(filename: $productsFileJson) ? json_decode(file_get_contents($productsFileJson), true) : [];
    $flag = false;
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $name;
            $product['description'] = $description;
            $product['price'] = $price;
            $product['image'] = $image;
            $flag = true;
            break;
        }
    }
    if ($flag === false) {
        return false;
    }
    file_put_contents($productsFileJson, json_encode($products, JSON_PRETTY_PRINT));
    return true;
}
