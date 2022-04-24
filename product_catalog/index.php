<?php
require('../model/database.php');
require('../model/functions.php');
require('../model/category_db.php');
require('../cart/cart.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $productList = get_products_by_category($category_id);
    include('product_list.php');
} else if ($action == 'view_product') {
    $product_id = filter_input(INPUT_GET, 'product_id', 
            FILTER_VALIDATE_INT);   
    if ($product_id == NULL || $product_id == FALSE) {
        $error = 'Missing or incorrect product id.';
        include('../errors/error.php');
    } else {
        $categories = get_categories();
        $productList = get_product($product_id);

        // Get product data
        $code = $productList['productCode'];
        $cost = number_format($productList['listPrice'], 2);
        $name = $productList['productName'];
        $list_price = $productList['listPrice'];
        $item = $name . ' ($' . $cost . ')';

        include('product_view.php');
    }   
} else if($action == 'add'){
    $product_key = filter_input(INPUT_POST, 'productkey');
    $item_qty = filter_input(INPUT_POST, 'itemqty');
    add_item($product_key, $item_qty);
    include('cart_view.php');
    }   
?>