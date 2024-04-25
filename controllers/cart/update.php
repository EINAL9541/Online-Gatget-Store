
<?php

$config = require('../config.php');
$db = new Database($config['database']);

$quantity = $_POST['quantity'];

$db->query('update cart set quantity=:quantity where id = :id', [
    'quantity' => $quantity,
    'id' => $_POST['id']
]);

header('location: /cart');