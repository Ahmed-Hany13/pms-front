<?php require_once "inc/header.php"; ?>

<form action="handlers/product/add-product.php" method="POST">

    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" ></textarea><br><br>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" id="price" name="price" class="form-control">
    </div>
    <div class="mb-3">
        <label for="files">Upload Files:</label><br>
        <input type="file" id="files" name="image" multiple><br><br>
    </div>

    <button type="submit" class="btn btn-success">Add</button>
</form>
<link href="../../css/styles.css" rel="stylesheet" />
<?php require_once "inc/footer.php"; ?>