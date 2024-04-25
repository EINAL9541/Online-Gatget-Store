<?php  



// validation pass, insert user into table, log the user in , redirect to home

$config = require('../config.php');
$db = new Database($config['database']);


$name = $_POST["name"];

$country = $_POST["country"];

if (strlen($name) === 0) {
    $errors['name'] = 'Please provide a name';
}

if (strlen($country) === 0) {
    $errors['country'] = 'Please provide a country';
}

if (!empty($errors)) {
 
    require('../views/admin/editBrand.view.php');
    die();
}

$db->query('UPDATE brand SET name=:name, country=:country WHERE  id=:id', [
    'name' => $name,
    'country' => $country,
    'id' =>$_POST['id'],
]);

header('location: /productBrand');

