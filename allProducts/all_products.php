<?php include '../view/header.php'; ?>
    <main>
        <h2>All Products</h2>
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                </tr>

                </tr>
                <?php foreach($productList as $products) : ?>
                <tr>
                    <td><?php echo $products['productID']; ?></td>
                    <td><?php echo $products['productCode']; ?></td>
                    <td><?php echo $products['productName']; ?></td>
                    <td><?php echo $products['listPrice']; ?></td>
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
    </main>
<?php include '../view/footer.php'; ?>
