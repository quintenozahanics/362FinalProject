<?php  
require('../model/database.php');
require('../model/functions.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
 if ($action == NULL) {
     $action = 'productList';
 }
}  

     $productList=get_putters();
     include('putters.php');
?>