<?php include "inc/header.php" ?>

<?php
    $id = $_POST['id'];

    $Products = getProducts();
    foreach($Products as $product){
        if($product['id'] == $id){
            $p =$product;
        }
    }
?>
<form action="handlers/product/update.php" method="POST">

<input type="hidden" id="id" name="id" class="form-control" value="<?= $p['id'] ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?= $p['name'] ?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <input type="text" id="description" name="description" class="form-control" value="<?= $p['description'] ?>">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" id="price" name="price" class="form-control" value="<?= $p['price'] ?>">
    </div>
    <div class="mb-3">
        <label for="files">Upload Files:</label><br>
        <input type="file" id="files" name="image" multiple><br><br>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
<link href="../css/styles.css" rel="stylesheet" />
<?php require_once "inc/footer.php"; ?>