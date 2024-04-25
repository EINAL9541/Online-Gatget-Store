<?php 
if($_SESSION['user']['isAdmin']==0)
{
    header('location: /');
    die();
}

  $title = 'Product Brand';
  $page = 'productBrand';

    require('../views/admin/createBrand2.view.php');

?>