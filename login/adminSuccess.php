<?php
    require('../model/database.php');
    require('../model/functions.php');
    include '../view/header.php';
?>

<?php
    session_start();
    echo '<p style="color: black; font-size: 32pt">Welcome ' . $_SESSION["uname"] . ' </p>';
?>

<p><a href="../admin/modifyProducts.php">Add a Product</a>
<p><a href="../admin/sales.php">See Sales</a>
<p><a href="../admin/deleteSale.php">Delete Sales</a>

<p><a href="logout.php">Logout</a>
    <?php include '../view/footer.php'; ?>