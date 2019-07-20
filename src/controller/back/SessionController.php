<?php

namespace Projet5\controller\back;

use Projet5\controller\TwigController;
use Projet5\model\UserModel;

class SessionController extends TwigController{


	public function __construct(){

		parent::__construct();

		//exit if not login
		if(!isset($_SESSION['IdConnectedUser'])){
			header('location:erreur-401');
			exit;
		}
		//exit if not valide
		if($_SESSION['rankConnectedUser'] == 'pending'){
			header('location:erreur-403');
			exit;
		}
	}
}