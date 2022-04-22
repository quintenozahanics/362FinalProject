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

function get_drivers()
{
    global $db;
    $queryDrivers = "SELECT * FROM products
                        WHERE categoryID = 1 ORDER BY productID";
    $statement = $db->prepare($queryDrivers);
    $statement->execute();
    $productList  = $statement->fetchAll();
    $statement->closeCursor();
    return $productList;
}

function get_irons()
{
    global $db;
    $queryDrivers = "SELECT * FROM products
                        WHERE categoryID = 2 ORDER BY productID";
    $statement = $db->prepare($queryDrivers);
    $statement->execute();
    $productList  = $statement->fetchAll();
    $statement->closeCursor();
    return $productList;
}

function get_wedges()
{
    global $db;
    $queryDrivers = "SELECT * FROM products
                        WHERE categoryID = 3 ORDER BY productID";
    $statement = $db->prepare($queryDrivers);
    $statement->execute();
    $productList  = $statement->fetchAll();
    $statement->closeCursor();
    return $productList;
}

function get_putters()
{
    global $db;
    $queryDrivers = "SELECT * FROM products
                        WHERE categoryID = 4 ORDER BY productID";
    $statement = $db->prepare($queryDrivers);
    $statement->execute();
    $productList  = $statement->fetchAll();
    $statement->closeCursor();
    return $productList;
}

function get_hybrids()
{
    global $db;
    $queryDrivers = "SELECT * FROM products
                        WHERE categoryID = 5 ORDER BY productID";
    $statement = $db->prepare($queryDrivers);
    $statement->execute();
    $productList  = $statement->fetchAll();
    $statement->closeCursor();
    return $productList;
}


?>