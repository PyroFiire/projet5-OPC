<?php
//Namespaces
use Projet5\controller\HomepageController;

// Composer Autoloader
require(__DIR__."/../vendor/autoload.php");

// Configuration and global variables
require(__DIR__."/config.php");

// Start the session
session_start();

// DataBase connexion
try{
	$pdo = new PDO("mysql:host=".$dbServer.";dbname=".$dbName.";charset=utf8", $dbUser, $dbPass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
}catch (Exception $e){
	exit('*********** Erreur de connexion ! ***********');		
}

//twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../view');
$twig = new \Twig\Environment($loader, [
    'cache' => false //__DIR__ .'/tmp'
]);