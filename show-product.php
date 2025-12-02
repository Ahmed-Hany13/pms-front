<?php include "inc/header.php" ?>

<h1>Products</h1>
<div class="container mt-5">
    <h2>Products List</h2>
    <table class="table table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(getProducts() as $product){
                echo "
                <tr>
                    <td>{$product['name']}</td>
                    <td>{$product['description']}</td>
                    <td>{$product['price']}</td>

                    <td class='d-flex gap-2'>
                    <form action='edit.php' method='POST'>
                        <input type='hidden' name='id' value='{$product['id']}'>
                        <button type='submit' class='btn btn-warning btn-small' >Edit</button>
                    </form>
                    <form action='handlers/product/delete.php' method='POST'>
                        <input type='hidden' name='id' value='{$product['id']}'>
                        <button type='submit' class='btn btn-danger btn-small' >Delete</button>
                    </form>
                    </td>
                </tr>    
                ";
            }
            ?>
        </tbody>
    </table>
</div>




<?php include "inc/footer.php"; ?> 
