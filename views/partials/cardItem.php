<?php
$config = require('../config.php');
$db = new Database($config['database']);

$note = $db->query("SELECT p.id,p.name,p.price,p.image,b.name as brandName,c.name as categoryName  FROM brand b, category c, product p WHERE p.brand_Id=b.id AND p.category_Id=c.id;")->get();




