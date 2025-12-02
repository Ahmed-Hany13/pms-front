<?php require_once('inc/header.php'); ?>
<?php //include "handlers/product/add-to-cart.php" 
?>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
        </div>
    </div>
</header>
<!-- Section-->

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['cart'])): ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?php echo $_SESSION['cart']['name']; ?></td>
                                <td>$<?php echo $_SESSION['cart']['price']; ?></td>
                                <td>
                                    <input type="number" value="1">
                                </td>
                                <td>$<?php echo $_SESSION['cart']['price']; ?></td>
                                <td>
                                    <form action='' method='POST'>
                                        
                                        <button type='submit' class='btn btn-danger btn-small'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Total Price
                                </td>
                                <td colspan="3">
                                    <h3>$<?php echo $_SESSION['cart']['price']; ?></h3>
                                </td>
                                <td>
                                    <a href="checkout.php" class="btn btn-primary">Checkout</a>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Your cart is empty.</td>
                            </tr>
                        <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>