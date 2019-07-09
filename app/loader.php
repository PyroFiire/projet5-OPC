<?php
use Projet5\model\UserModel;


// Composer Autoloader
require(__DIR__."/../vendor/autoload.php");

// Configuration and global variables
require(__DIR__."/config.php");

// Start the session
session_start();

//Models

$userModel = new UserModel($dataBase);