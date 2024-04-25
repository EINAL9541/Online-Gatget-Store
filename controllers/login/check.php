<?php

$otp = $_POST['otp'];
$config = require('../config.php');
$db = new Database($config['database']);

 if (strlen($otp) === 0) {
    $errors['otp'] = 'Please provide a OTP';
}

if($_COOKIE['randomNumber'] !== $otp)
{
    $errors['otp'] = 'Your OTP is wrong Try again!';
}

if (!empty($errors)) {
      
    require('../controllers/login/requestEmail.php');
    die();
}

header('location: /forgetPassword');
