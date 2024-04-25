<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../phpmailer/src/Exception.php');
require('../phpmailer/src/PHPMailer.php');
require('../phpmailer/src/SMTP.php');

$email = $_POST['email'];
$config = require('../config.php');
 $db = new Database($config['database']);

 $check = $db->query("SELECT * FROM user WHERE email=:id", ['id' => $email])->find();
 if(!$check) {
     $errors['email'] = "The email does not exist";
 }

 if (strlen($email) === 0) {
    $errors['email'] = 'Please provide a email';
}

if (!empty($errors)) {
      
    require('../controllers/login/requestEmail.php');
    die();
}

    var_dump($_POST['email']);
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'guna08768@gmail.com';
    $mail->Password = 'qbuqzknlphzypuam';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;


    $mail->setFrom('guna08768@gmail.com');

    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);

    $mail->Subject =  "One Time Password";

    $num = rand(100000,999999);
    $exp = time()+60;
    setcookie("randomNumber",$num, $exp);

    $mail->Body = $num;
   
    $mail->send();
    header('location: /forgetPassword');





