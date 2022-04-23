<?php include '../view/header.php'; ?>
<?php
    session_start();
    echo '<p style="color: black; font-size: 32pt">Welcome ' . $_SESSION["uname"] . ' </p>';
?>
<h3>Product Selection</h3>
    <p>
        <a href='../allProducts/'>All Products</a>  
        <a href='../drivers/'>Drivers</a>
        <a href='../irons/'>Irons</a>
        <a href='../wedges/'>Wedges</a>
        <a href='../putters/'>Putters</a>
        <a href='../hybrids/'>Hybrids</a>
    </p>
    <a href="../cart/">View Cart</a>
    <p><a href="logout.php">Logout</a>
<?php include '../view/footer.php'; ?>