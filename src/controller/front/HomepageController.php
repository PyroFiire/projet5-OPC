<?php

namespace Projet5\controller\front;

use Projet5\controller\TwigController;

class HomepageController extends TwigController{

	public function index($userModel){

		//load userDatas if is connected
		if (isset($_SESSION['IdConnectedUser'])) {
			$userDatas = $userModel->load($_SESSION['IdConnectedUser']);
		}else{
			$userDatas = [];
		}
		echo $this->twig->render('homepage.php', ['SESSION' => $_SESSION, 'userDatas' => $userDatas ]);
	}
}