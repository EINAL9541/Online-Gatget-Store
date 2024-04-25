<?php  



// validation pass, insert user into table, log the user in , redirect to home

$config = require('../config.php');
$db = new Database($config['database']);

$db->query('update userorder set status=1 where id=:id', ['id' =>$_POST['id']]);

header('location: /orderTable');
