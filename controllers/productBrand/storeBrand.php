<?php

// validation pass, insert user into table, log the user in , redirect to home

$config = require('../config.php');

$db = new Database($config['database']);

$name = $_POST['brand'];
$country = $_POST['country'];


$errors = [];



$checkEmailQuery = $db->query("SELECT * FROM brand WHERE LOWER(name)=LOWER(:name)", ['name' => $name])->find();

if (!empty($checkEmailQuery)){

    $errors['name'] = "Brand Already Exists!";
}






if (strlen($name) === 0) {
    $errors['name'] = 'Please provide a name';
}

if (strlen($country) === 0) {
    $errors['country'] = 'Please provide a country';
}

if (!empty($errors)) {
 
    require('../controllers/productBrand/insertBrand.php');
    die();
}


    $db->query('insert into brand(name,country) values (:name, :country)', [
        'name' => $name,
        'country' => $country,
       
    ]);


    header('location: /productBrand');


  

