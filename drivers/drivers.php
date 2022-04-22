<?php include '../view/header.php'; ?>
    <main>
        <h2>Drivers</h2>
            <table>
                <tr>
                    <th>Product Code</th>
                    <th>Product</th>
                    <th>Price</th>
                </tr>

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
                <a href="../irons/">Irons</a>
                <a href="../wedges/">Wedges</a>
                <a href="../putters/">Putters</a>
                <a href="../hybrids/">Hybrids</a></p>
            </section>
    </main>
<?php include '../view/footer.php'; ?>
