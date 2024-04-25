
<?php

$config = require('../config.php');
$db = new Database($config['database']);

$db->query('delete from product where id = :id', [
    'id' => $_POST['id']
]);

header('location: /productTable');