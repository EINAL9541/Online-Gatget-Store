<?php 
if($_SESSION['user']['isAdmin']==0)
{
    header('location: /');
    die();
}

  $title = 'Order Table';
  $page = 'orderTable';

    require('../views/adminOrder/orderTable.view.php');

?>