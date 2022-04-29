<?php
function get_products()
{
    global $db;
    $queryAllProducts = "SELECT * FROM products
    ORDER BY productID";
    $statement = $db->prepare($queryAllProducts);
    $statement->execute();
    $productList  = $statement->fetchAll();
    $statement->closeCursor();
    return $productList;
}

function get_products_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE products.categoryID = :category_id
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($category_id, $code, $name, $price) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
              VALUES
                 (:category_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code',  $code);
    $statement->bindValue(':name',  $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

function displayImage($code){
    switch ($code){
        case 1:
            echo "<img src='../images/driver.jpg' width='100%' height='100%'>";
            break;
        case 2:
            echo "<img src='../images/iron.jpeg' width='100%' height='100%'>";
            break;
        case 3:
            echo "<img src='../images/wedge.jpeg' width='100%' height='100%'>";
            break;
        case 4:
            echo "<img src='../images/putter.jpg' width='100%' height='100%'>";
            break;
        case 5:
            echo "<img src='../images/hybrid.jpeg' width='100%' height='100%'>";
            break;
    }
}

function getAllCustomers(){
    $dsn = 'mysql:host=sql5.freemysqlhosting.net;dbname=sql5483898';
    $username = 'sql5483898';
    $password = 'ulgzmHhz7l';
    $db = new PDO($dsn, $username, $password);
    
    $query = "SELECT fullname FROM sql5483898.users";
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

function getAllSales(){
    $dsn = 'mysql:host=sql5.freemysqlhosting.net;dbname=sql5483898';
    $username = 'sql5483898';
    $password = 'ulgzmHhz7l';
    $db = new PDO($dsn, $username, $password);

    $query = "SELECT * FROM sql5483898.orders";
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;

}

function showAllSalesButton(){
    if(isset($_POST['all'])){
        $orders = getAllSales();
        foreach($orders as $order) :
            echo "<tr>";
            echo "<th>" . $order[0] . "</th>";
            echo "<th>" . $order[1] . "</th>";
            echo "<th>" . $order[2] . "</th>";
            echo "<th>" . $order[3] . "</th>";
            echo "<th>" . $order[4] . "</th>";
            echo '<td><input type="checkbox" name="checkbox[]" value="'.$order[0].'" id="checkbox"></td>';
            echo "</tr>";
        endforeach; 

    }
}

function deleteSale(){
    $dsn = 'mysql:host=sql5.freemysqlhosting.net;dbname=sql5483898';
    $username = 'sql5483898';
    $password = 'ulgzmHhz7l';
    $db = new PDO($dsn, $username, $password);
    $list = $_POST['checkbox'];

    $query = "DELETE FROM sql5483898.orders WHERE orderID IN ('.$list.')";
    $statement = $db->prepare($query);
    $statement->execute();
}

function searchACustomer($customer){
    $dsn = 'mysql:host=sql5.freemysqlhosting.net;dbname=sql5483898';
    $username = 'sql5483898';
    $password = 'ulgzmHhz7l';
    $db = new PDO($dsn, $username, $password);

    $query = "SELECT * FROM sql5483898.orders WHERE uname = :uname ";
    $statement = $db->prepare($query);
    $statement->bindValue(':uname', $customer);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();

    foreach($orders as $order) :
        echo "<tr>";
        echo "<th>" . $order[0] . "</th>";
        echo "<th>" . $order[1] . "</th>";
        echo "<th>" . $order[2] . "</th>";
        echo "<th>" . $order[3] . "</th>";
        echo "<th>" . $order[4] . "</th>";
        echo '<td><input type="checkbox" name="checkbox[]" value=' . $order[0] . ' id="checkbox"></td>';
        echo "</tr>";
    endforeach; 

}


?>
