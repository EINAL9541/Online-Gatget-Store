<?php

// validation pass, insert user into table, log the user in , redirect to home

$config = require('../config.php');

$db = new Database($config['database']);

$name = $_POST['category'];



$errors = [];






$checkEmailQuery = $db->query("SELECT * FROM category WHERE LOWER(name)=LOWER(:name)", ['name' => $name])->find();

if (!empty($checkEmailQuery)) {

    $errors['category'] = "Category Already Exists!";
}


if (strlen($name) === 0) {
    $errors['category'] = 'Please provide a name';
}


if (!empty($errors)) {

    require('../views/admin/insertCategory.view.php');
    die();
}


$db->query('insert into category(name) values (:name)', [
    'name' => $name,
    

]);


header('location: /productCategory');
