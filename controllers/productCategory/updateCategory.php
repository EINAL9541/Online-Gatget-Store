<?php

$config = require('../config.php');
$db = new Database($config['database']);


$category = $_POST['category'];



if (strlen($category) === 0) {
    $errors['category'] = 'Please provide a name';
}

if (!empty($errors)) {
 
    require('../views/admin/editCategory.view.php');
    die();
}

$db->query('UPDATE category SET name=:name WHERE  id=:id', [
    'name' => $category,
    'id' =>$_POST['id'],
]);

header('location: /productCategory');