<?php
require('../model/database.php');
require('../model/functions.php');
include '../view/header.php'; ?>

<h2>Insert into Products Table</h2>
<form method="post">
        <input type="text" name="category_ID" placeholder="Category ID:"><br>
        <input type="text" name="product_code" placeholder="Product Code:"><br>
        <input type="text" name="product_name" placeholder="Product Name:"><br>
        <input type="text" name="list_price" placeholder="Price:"><br><br>
        <input type="submit" value="Add Product" name="addproduct">
</form>
<p><a href="../login/adminSuccess.php">Go back</a>
<p><a href="../login/logout.php">Logout</a>

<?php
    if (isset($_POST["addproduct"])) {
        if (empty($_POST["category_ID"]) || empty($_POST["product_code"]) || empty($_POST["product_name"]) || empty($_POST["list_price"])) {
            $errorMsg = '<p style="color: red; font-size: 24pt;"> ERROR: Fields cannot be blank </p>';
        } 
        else {
            $dsn = 'mysql:host=sql5.freemysqlhosting.net;dbname=sql5483898';
            $username = 'sql5483898';
            $password = 'ulgzmHhz7l';
            $db = new PDO($dsn, $username, $password);    
            $data = ['category_ID' => $_POST["category_ID"],
                'product_code' => $_POST["product_code"],
                'product_name' => $_POST["product_name"],
                'list_price' => $_POST["list_price"]];
            $statement2 = $db->prepare("SELECT productCode FROM products WHERE productCode=?");
            $statement2->bindParam(1, $_POST["product_code"]);
            $statement2->execute();
            $isExisting = $statement2->fetch();
            if($isExisting){
                $errorMsg = "<p style='color: red; font-size: 24pt;'> ERROR: Product already exists. </p>";
            }
            else{
                $query = "INSERT INTO products (categoryID, productCode, productName, listPrice) VALUES (:category_ID, :product_code, :product_name, :list_price)";
                $statement = $db->prepare($query);
        
                try{
                    $statement->execute($data);
                    $errorMsg = "<p style='color: green; font-size: 24pt;'> Product added. </p>";
                }
                catch(Exception $e){
                    echo "Error: " . $e->getMessage();
                }
            
            }
        }

    }

if (isset($errorMsg)) {
    echo '<span>' . $errorMsg . '</span>';
}

include '../view/footer.php';

?>