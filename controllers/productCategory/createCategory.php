<?php 

if($_SESSION['user']['isAdmin']==0)
{
    header('location: /');
    die();
}

  $title = 'Product Category';
  $page = 'productCategory';

    require('../views/admin/createCategory.view.php');

?>