<?php
include "../../core/validation.php";
include "../../core/function.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST['name']);
    $name = htmlspecialchars($name);
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_dir = __DIR__ . "/../../assets";
    move_uploaded_file($image_tmp,$image_dir."/".$image_name);
    $error = validateAddProduct($name,$description,$image);

    if(!empty($error)){
        Set_Session($error , "danger");
        header("Location: ../../add-product.php");
        exit;
    }
    if (addProduct($name,$description,$price ,$image)){
        $_SESSION['product'] = [
            "name" => $name ,
            "description" => $description ,
            "price" => $price ,
            "image" => $image 
        ];
        Set_Session("Product Added Successfully " , "success");
        header("Location: ../../show-product.php");
        exit;
    }
}