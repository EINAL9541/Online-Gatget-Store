<?php
if($_SESSION['user']['isAdmin']==0)
{
    header('location: /');
    die();
}



$title = "Admin DashBord";
$page = "admin";
require('../views/admin/dashbord.view.php');

?>
  
 