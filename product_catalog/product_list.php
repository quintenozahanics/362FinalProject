<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Categories</h1>
        <nav>
        <ul>
            <!-- display links for all categories -->
            <?php foreach($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    <section>
        <h1><?php echo $category_name; ?></h1>
        <nav>
        <ul>
            <!-- display links for products in selected category -->
            <?php foreach($productList as $key => $product) :
                $prodID = ($product['productID']);
                $cost = number_format($product['listPrice'], 2);
                $name = $product['productName'];
                $item = $name . ' ($' . $cost . ')';
            ?>
            <li>
                <a href="?action=view_product&amp;product_id=<?php 
                          echo $prodID; ?>">
                    <?php echo $name; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </section>
    <a style='float: right;' href="../login/userSuccess.php">Back to Home</a></p>
</main>
<?php include '../view/footer.php'; ?>
