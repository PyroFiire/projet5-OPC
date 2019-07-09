<?php
namespace Projet5\controller;

class ConnexionController extends Controller{

	public function run(){
		echo $this->twig->render('connexion.php');
	}
}