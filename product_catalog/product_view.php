<?php 
    require_once '../cart/cart.php';
    include '../view/header.php';
?>

<main>
    <aside>
        <h1>Categories</h1>
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php 
                              echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    <section>
        <h1><?php echo $name; ?></h1>
        <div id="right_column">
            <p><label>List Price:</label> $<?php echo $cost; ?></p>
            <form action="<?php echo '../cart' ?>" method="post">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="product_id"
                       value="<?php echo $product_id; ?>">
                <Label>Quantity:</label>
                <input id="itemqty" type="text" name="quantity" 
                       value="1" size="2">

                <?php
                    $statement = $db->prepare("SELECT categoryID FROM products WHERE productID=?");
                    $statement->bindParam(1, $product_id);
                    $statement->execute();
                    $queriedCatID = $statement->fetch();   
                ?>
                <br><br>
                <input type="submit" value="Add to Cart">
                <?php displayImage($queriedCatID[0]) ?>
            </form>
        </div>
    </section>
    <a style='float: right;' href="../login/userSuccess.php">Back to Home</a></p>
</main>
<?php include '../view/footer.php'; ?>

<form action="." method="post"