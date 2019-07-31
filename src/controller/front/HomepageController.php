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

	    //the form is submit, controle and send mail

	    //inialise $error
    	$error =[];

	    //control
	    $firstname = (isset($_POST["firstname"])) ? $_POST["firstname"] :"" ;
	    $lastname = (isset($_POST["lastname"])) ? $_POST["lastname"] :"" ;
		$email = (isset($_POST["email"])) ? $_POST["email"] :"" ;
	    $message = (isset($_POST["message"])) ? $_POST["message"] :"";

		if (!preg_match('/^[[:print:]]+\z/', $firstname) || strlen($firstname)<1) {
		        $error['firstname'] ='Le prénom n\'est pas renseigné ou invalide.';
		    }
	    if (!preg_match('/^[[:print:]]+\z/', $lastname) || strlen($lastname)<1) {
	        $error['lastname'] ='Le nom n\'est pas renseigné ou invalide.';
	    }
	    if (!preg_match('/^[[:print:]]+\z/', $email) && false == filter_var($email,FILTER_VALIDATE_EMAIL) ) {
	        $error['email'] ='L\'adresse email n\'est pas renseigné ou invalide.';
	    }
	    if (strlen($message)<1) {
	        $error['message'] ='Le message n\'est pas renseigné ou invalide.';
	    }

	    //if no error, send mail and redirect on homepage
	    if (empty($error)){
			$mailController = new MailController;
			$mailController->sendmail(
				$sujet ='Réponse à votre question',
				$emailexp ='contact@christophe-guinot.fr',
				$emaildest ='christophe.guinot@hotmail.fr',
				$replyto = $email ,
				$nomexp = $firstname .' '.  $lastname,
				$messexp = $message
			);
			header('location:Accueil');
			exit;
		}
		
		//form information in a table for simplicity with twig
	    $form = [
	    	"firstname" => $firstname ,
	    	"lastname" => $lastname ,
	    	"email" => $email ,
	    	"message" => $message
	    ];

	    //display the form with errors and datas form
		echo $this->twig->render('homepage.php', ['SESSION' => $_SESSION, 'error' => $error, 'form' => $form ]);
	}
}