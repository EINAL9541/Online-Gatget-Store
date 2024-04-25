<?php

// validation pass, insert user into table, log the user in , redirect to home

$config = require('../config.php');

$db = new Database($config['database']);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$errors = [];


$checkEmailQuery = $db->query("SELECT * FROM user WHERE email=:id", ['id' => $email])->find();


if ($checkEmailQuery){

    $errors['email'] = "Email already exists!";
}




if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Pleade provide a valid email';
}


if (strlen($name) === 0) {
    $errors['name'] = 'Please provide a name';
}

if (strlen($email) === 0) {
    $errors['email'] = 'Please provide a email';
}

if (strlen($password) === 0) {
    $errors['password'] = 'Please provide a password';
}

if ($confirmPassword !== $password) {
    $errors['confirmPassword'] = 'Your password and confirmation password do not match';
}

if (strlen($confirmPassword) === 0) {
    $errors['confirmPassword'] = 'Please provide a confirm password';
}

// $user = $db->query('select * from users where email=:email', [
//     'email' => $email
// ])->find();

// if ($user) {
//     $errors['email'] = 'Account with the email already exists';
// }

if (!empty($errors)) {
    require('../views/registration/registerCreate.view.php');
    die();
}

try {
    $db->query('insert into user(name, email, password,isAdmin) values (:name, :email, :password, :isAdmin)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'isAdmin' => 0
    ]);

    

    header('location: /login');
} catch (Exception $e) {

    $errors['email'] = 'Account with the email already exists';
}
