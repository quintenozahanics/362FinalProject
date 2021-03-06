<?php include '../view/header.php'; ?>
    <main>
        <h1>Add Item</h1>
        <form action="." method="post">
            <input type="hidden" name="action" value="add">

            <label>Name:</label>
            <select name="productkey">
            <?php foreach($productList as $key => $product) :
                $cost = number_format($product['listPrice'], 2);
                $name = $product['productName'];
                $item = $name . ' ($' . $cost . ')';
            ?>
                <option value="<?php echo $key; ?>">
                    <?php echo $item; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Quantity:</label>
            <select name="itemqty">
            <?php for($i = 1; $i <= 10; $i++) : ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </option>
            <?php endfor; ?>
            </select><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item">
        </form>
        <p><a href=".?action=show_cart">View Cart</a> 
        <a style='float: right;' href="../login/userSuccess.php">Back to login</a></p>   
        <?php include '../view/footer.php'; ?> 

        