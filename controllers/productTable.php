<?php
if($_SESSION['user']['isAdmin']==0)
{
    header('location: /');
    die();
}

$title = "Product data table";
$page = "product";
require('../views/admin/productTable.view.php');

?>