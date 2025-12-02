<?php
include __DIR__ . "/../../core/function.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['cart'] = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price']
    ];
    header("Location: ../../cart.php");
    exit();
}

