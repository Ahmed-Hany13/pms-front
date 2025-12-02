<?php
// session_start();
include "../../core/validation.php";
include "../../core/function.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && !empty($_POST['id'])) {
    $id = trim((int)$_POST['id']);

    if (deleteProduct($id)) {
        Set_Session("Delete Success", "success");
        header("Location: ../../show-product.php");
        exit;
    } else {
        Set_Session("Invalid Request1", "danger");
        header("Location: ../../index.php");
        exit;
    }
} else {
    Set_Session("Invalid Request2", "danger");
    header("Location: ../../index.php");
    exit;
}