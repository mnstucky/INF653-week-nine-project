<?php
    $dsn = 'mysql:host=pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=ly1qha9dduvntk37';
    $username = 'tw73mwrxxzzv6dam';
    $password = 'qos03u1dnafuy1jm';
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $db_error_msg = $e->getMessage();
        include('../view/error.php');
        exit();
    }
