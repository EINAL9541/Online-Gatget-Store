<?php

// validation pass, insert user into table, log the user in , redirect to home

$config = require('../config.php');
$db = new Database($config['database']);

$name = $_POST['name'];
$price = $_POST['price'];
$releaseDate = $_POST['releaseDate'];
$review = $_POST['review'];
$quantity = $_POST['quantity'];
$errors = [];



if (strlen($name) === 0) {
    $errors['name'] = 'Please provide a name';
}

if (strlen($price) === 0) {
    $errors['price'] = 'Please provide a price';
}

if (strlen($releaseDate) === 0) {
    $errors['releaseDate'] = 'Please provide a Release Date';
}


if (strlen($quantity) === 0) {
    $errors['quantity'] = 'Please provide a quantity';
}

if (isset($_POST['brand'])) {
    $brand = $_POST['brand'];
} else {
    $errors['brand'] = 'Please provide a brand';
}

if (isset($_POST['category'])) {
    $category = $_POST['category'];
} else {
    $errors['category'] = 'Please provide a category';
}

if (strlen($review) === 0) {
    $errors['review'] = 'Please provide a review';
}


if (($_FILES['image']['size']) != 0) {
    $file_name = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $folder = 'img/' . $file_name;

    $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
    $imageExtension = explode('.', $file_name);
    $imageExtension = strtolower(end($imageExtension));

    if (!in_array($imageExtension, $validImageExtension)) {

        $errors['image'] = 'File Extension not allow';
    }
}
else{
    $errors['image'] = 'Please provide a image';
}


if (!empty($errors)) {
 
    require('../controllers/productData/create.php');
    die();
}

if (move_uploaded_file($tmp, $folder)) {
    $db->query('insert into product(name, price, releaseDate,image,quantity,review,brand_Id,category_Id) values (:name, :price, :releaseDate, :image, :quantity, :review, :brand_Id, :category_Id)', [
        'name' => $name,
        'price' => $price,
        'releaseDate' => $releaseDate,
        'image' => $folder,
        'quantity' => $quantity,
        'review' =>   $review,
        'brand_Id' => $brand,
        'category_Id' => $category,
    ]);
    header('location: /admin/productTable');
}


