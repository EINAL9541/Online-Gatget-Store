<?php 
session_start();
require('../function.php');
require('../router.php');
require('../Database.php');


$routes = require('../routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];

Router::route($uri,$method,$routes);