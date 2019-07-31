<?php

namespace Projet5\controller\back;

use Projet5\controller\TwigController;
use Projet5\model\UserModel;

class SessionController extends TwigController{


	public function __construct(){

		parent::__construct();

		//exit if not login
		if(!isset($_SESSION['IdConnectedUser'])){
			$_SESSION['error'] = 'Vous n\'êtes pas connecté';
			header('location:Accueil');
			exit;
		}
		//exit if not valide
		if($_SESSION['rankConnectedUser'] == 'pending'){
			$_SESSION['error'] = 'Votre compte n\'a pas encore été validé par un administrateur';
			header('location:Accueil');
			exit;
		}
	}
}