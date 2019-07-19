<?php
session_start();

// Composer Autoloader
require('vendor/autoload.php');

//ROUTER
use Projet5\controller\Router;
$router = new Router();
$router->run();
