<?php

namespace Projet5\model;
use PDO;

class Model{

	protected $pdo;

	public function __construct($dataBase){
		// DataBase connexion
		try{
			$pdo = new PDO("mysql:host=".$dataBase['dbServer'].";dbname=".$dataBase['dbName'].";charset=utf8", $dataBase['dbUser'], $dataBase['dbPass'], array(PDO::ATTR_PERSISTENT => true));
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
		}catch (Exception $e){
			exit('*********** Error BDD ! ***********');		
		}
		$this->pdo = $pdo;
	}
	
}