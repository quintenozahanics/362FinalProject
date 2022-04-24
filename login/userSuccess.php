<?php include '../view/header.php'; 

    //if no user is logged in sends you to the login page
    session_start();
    if (empty($_SESSION['cart'])) { $_SESSION['cart'] = array(); }
    
    if(!isset($_SESSION["uname"])){
        header("Location:index.php");
     }

    echo '<p style="color: black; font-size: 32pt">Welcome ' . $_SESSION["uname"] . ' </p>';
    
?>

<h3>View Products</h3>           
<a href='../product_catalog/'>All Products</a>        
    
    <p><a href="../cart/">View Cart</a>
    <a style='float: right;' href="logout.php">Logout</a></p>
<?php include '../view/footer.php'; ?>