<?php include '../view/header.php'; ?>
    <main>
        <h2>Wedges</h2>
            <table>
                <tr>
                    <th>Product Code</th>
                    <th>Product</th>
                    <th>Price</th>
                </tr>

                <?php foreach($productList as $products) : ?>
                <tr>
                    <td><?php echo $products['productCode']; ?></td>
                    <td><?php echo $products['productName']; ?></td>
                    <td><?php echo $products['listPrice']; ?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <section>
                <p><a href="../allProducts/">All Products</a>
                <a href="../drivers/">Drivers</a>
                <a href="../irons/">Irons</a>
                <a href="../putters/">Putters</a>
                <a href="../hybrids/">Hybrids</a></p>
            </section>
            <br><a href="../login/userSuccess.php">Back to Home</a>
    </main>
<?php include '../view/footer.php'; ?>
