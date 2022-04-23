<?php include('../cart/cart.php');?>
<?php include '../view/header.php'; ?>
    <main>
        <h2>All Products</h2>
            <table>
                <tr>
                    <th>Product Code</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Add To Cart</th>
                </tr>

                </tr>
                <?php foreach($productList as $products) : ?>
                <tr>
                    <td><?php echo $products['productCode']; ?></td>
                    <td><?php echo $products['productName']; ?></td>
                    <td><?php echo $products['listPrice']; ?></td>
                    <td><?php echo "<input type='button' onclick='add_item()' value='Add To Cart'>"; ?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <section>
                <p><a href="../drivers/">Drivers</a>
                <a href="../irons/">Irons</a>
                <a href="../wedges/">Wedges</a>
                <a href="../putters/">Putters</a>
                <a href="../hybrids/">Hybrids</a></p>
            </section>
            <br><a href="../login/userSuccess.php">Back to Home</a>
    </main>
<?php include '../view/footer.php'; ?>
