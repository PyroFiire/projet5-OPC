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

		//The form is not submitted, display the homepage
	    if(count($_POST)===0){
	        echo $this->twig->render('homepage.php', ['SESSION' => $_SESSION, 'userDatas' => $userDatas ]);
	        return;
	    }

	    //the form is submit, send mail

		$mailController = new MailController;
		$mailController->sendmail(
			$sujet='test',
			$emailexp='contact@christophe-guinot.fr',
			$emaildest='christophe.guinot@hotmail.fr',
			$replyto='christophe.guinot@hotmail.fr',
			$nomexp='christophe.guinot@hotmail.fr',
			$messexp='test'
		);
	}
}