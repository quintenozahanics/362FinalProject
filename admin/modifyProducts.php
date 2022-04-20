<?php
require('../model/database.php');
require('../model/functions.php');
include '../view/header.php'; ?>

<h2>Insert into Products Table</h2>
<form method="post">
    <p>
        <label for="productID">Product ID:</label>
        <input type="text" name="product_id" id="productID">
    </p>

    <p>
        <label for="categoryID">Category ID:</label>
        <input type="text" name="category_ID" id="categoryID">
    </p>

    <p>
        <label for="productCode">Product Code:</label>
        <input type="text" name="product_code" id="productCode">
    </p>

    <p>
        <label for="productName">Product Name:</label>
        <input type="text" name="product_name" id="productName">
    </p> 
    
    <p>
        <label for="listPrice">Product Price:</label>
        <input type="text" name="list_price" id="listPrice">
    </p>

    <input type="submit" value="Submit">
</form>
<p><a href="../login/adminSuccess.php">Click me to go back!</a>
<p><a href="../login/logout.php">Click me to Logout!</a>
    <?php include '../view/footer.php'; ?>