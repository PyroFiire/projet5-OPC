<?php
use Projet5\model\UserModel;
use Projet5\model\PostModel;

// Composer Autoloader
require(__DIR__."/../vendor/autoload.php");

// Configuration and global variables
require(__DIR__."/config.php");

// Start the session
session_start();

//Models

$userModel = new UserModel($dataBase);
$postModel = new PostModel($dataBase);