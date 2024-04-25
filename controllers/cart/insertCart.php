<?php

$config = require('../config.php');
$db = new Database($config['database']);

$quantity = $_POST['quantity'];
$product_Id = $_POST['id'];
$user_Id = $_SESSION['user']['user_id'];
$price = $db->query("select price from product where id=:id", ['id' => $product_Id])->find();
$total = (int)$quantity * $price['price'];

$db->query('insert into cart(quantity,total,product_Id,user_ID) values (:quantity,:total,:product_Id, :user_Id)', [
    'quantity' => $quantity,
    'total' => $total,
    'product_Id' => $product_Id,
    'user_Id' => $user_Id
]);

// $mainQuantity = $db->query("select quantity from product where id=:id", ['id' => $product_Id])->find();
// $abstractQuantity = $mainQuantity['quantity'] - (int)$quantity;

// if($abstractQuantity == 0)
// {
//     $db->query('delete from product where id = :id', [
//         'id' => $product_Id
//     ]);
// }

// $db->query("update product set quantity=:quantity where id=:id",[
//     'quantity' => $abstractQuantity ,
//     'id' => $product_Id
// ]);

header('location: /');
