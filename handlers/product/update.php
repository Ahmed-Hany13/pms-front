<?php
include "../../core/validation.php";
include "../../core/function.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $name = htmlspecialchars($name);
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $error = validateAddProduct($name,$description,$image);

    if(!empty($error)){
        Set_Session($error , "danger");
        header("Location: ../../index.php");
        exit;
    }
    if (updateProduct($id, $name,$description,$price,$image)){
        Set_Session("successful update " , "success");
        header("Location: ../../show-product.php");
        exit;
    }
}