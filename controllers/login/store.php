<?php


 $email = $_POST['email'];
 $password = $_POST['password'];


$errors = [];

$config = require('../config.php');
 $db = new Database($config['database']);

$check = $db->query("SELECT * FROM user WHERE email=:id", ['id' => $email])->find();
if(!$check) {
    $errors['email'] = "The email does not exist";
}

if (strlen($email) === 0) {
    $errors['email'] = 'Please provide a email';
}

if(!empty($check)){
    if (!password_verify($password, $check['password'])) {
  
        $errors['password'] = "password wrong!";
    } 
};


if (strlen($password) === 0) {
    $errors['password'] = 'Please provide a password';
}



if (!empty($errors)) {
      
    require('../controllers/login/create.php');
    die();
}

$_SESSION['user'] = [

    'user_id' => $check['id'],
    'name' => $check['name'],
    'email' => $check['email'],
    'isAdmin' => $check['isAdmin']
];



    header('location: /');
