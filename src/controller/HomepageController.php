<?php

namespace Projet5\controller;

class HomepageController extends Controller{

	public function run($userModel){

		//load userDatas if is connected
		if (isset($_SESSION['IdConnectedUser'])) {
			$userDatas = $userModel->load($_SESSION['IdConnectedUser']);
		}else{
			$userDatas = [];
		}
		echo $this->twig->render('homepage.php', ['SESSION' => $_SESSION, 'userDatas' => $userDatas ]);
	}
}