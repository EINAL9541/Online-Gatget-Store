<?php

// validation pass, insert user into table, log the user in , redirect to home

$config = require('../config.php');

$db = new Database($config['database']);
$error = [];

$name = $_POST['name'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$note = $_POST['note'];
$orderDate = date('y/m/d');

if(strlen($name) == 0)
{
    $error['name'] = "Please provite a name";
}

if(strlen($address) == 0)
{
    $error['address'] = "Please provite a address";
}

if(strlen($mobile) == 0)
{
    $error['phone'] = "Please provite a phoneNumber";
}

if(strlen($note) == 0)
{
    $error['note'] = "Please provite a note";
}

if (!empty($error)) {
    require('../views/checkout.view.php');
    die();
}



$db->query('insert into userorder(orderDate, name,address, mobile, note) values (:orderDate, :name, :address, :mobile, :note)', [
    'orderDate' => $orderDate,
    'name' => $name,
   'address' => $address,
   'mobile' => $mobile,
   'note' => $note,
]);


$userorder_Id =  intval($db->connection->lastInsertId());



$db->query('insert into orderitem (quantity,total,userorder_Id,product_Id,user_Id) select quantity,total,:userorder_Id,product_Id,user_Id from cart where cart.user_Id=:id',[ 'id'=>$_SESSION['user']['user_id'],'userorder_Id' => $userorder_Id]);
$db->query('delete from cart where user_Id=:id',['id'=>$_SESSION['user']['user_id']]);

$quantity = $db->query("select quantity,product_Id from orderitem where user_Id=:id AND userorder_Id=:user_Id",[ 'id'=>$_SESSION['user']['user_id'], 'user_Id'=>$userorder_Id])->get();

foreach($quantity as $q => $v)
{
   
    $mainQuantity = $db->query("select quantity from product where id=:id", ['id' => $v['product_Id']])->find();
    $abstractQuantity = $mainQuantity['quantity'] - (int)$v['quantity'];
   
    if($abstractQuantity == 0)
{
    $db->query('delete from product where id = :id', [
        'id' => $v['product_Id']
    ]);
}

$db->query("update product set quantity=:quantity where id=:id",[
    'quantity' => $abstractQuantity ,
    'id' => $v['product_Id']
]);
}


header('location: /');