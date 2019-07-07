<?php

namespace Projet5\model;

class Model{

	protected $pdo;

	public function __construct(){
		// DataBase connexion
		try{
			$pdo = new PDO("mysql:host=".$dbServer.";dbname=".$dbName.";charset=utf8", $dbUser, $dbPass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
		}catch (Exception $e){
			exit('*********** Erreur de connexion ! ***********');		
		}
		$this->pdo = $pdo;
	}
	
}