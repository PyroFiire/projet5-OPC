<?php

namespace Projet5\controller;

class DeconnexionController{

	public function run(){
		unset($_SESSION['IdConnectedUser']);
		session_destroy();
		header("Location:Accueil");
	}
}