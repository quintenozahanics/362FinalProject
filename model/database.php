<?php
    $dsn = 'mysql:host=sql5.freemysqlhosting.net;dbname=sql5483898';
    $username = 'sql5483898';
    $password = 'ulgzmHhz7l';

    try{
        $db = new PDO($dsn, $username, $password);
    } catch(PDOException $e){
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>