<?php
namespace Projet5\controller;

class ConnexionController extends Controller{

	public function run($userModel){

	

    //The form is not submitted, posting the connexion form
    if(count($_POST)===0){
        echo $this->twig->render('connexion.php');
        return;
    }
    //unset session for security and inialise $error
    unset($_SESSION['IdConnectedUser']);
    $error =[];

    //control
    $email = (isset($_POST["email"])) ? $_POST["email"] :"" ;
    $password = (isset($_POST["password"])) ? $_POST["password"] :"";

    if (!preg_match('/^[[:print:]]+\z/', $email) && false == filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error['email'] ='L\'adresse email n\'est pas renseigné ou invalide.';
    }

    if (!preg_match('/^[[:print:]]+\z/', $password) || strlen($password)<8) {
        $error['password'] ='Le mot de passe n\'est pas renseigné ou invalide.';
    }

    //load user if control ok
    if (empty($error)) {
        $userDatas = $userModel->loadByEmail($email);

        //if password ok, load id user in the session and go homepage
        if(password_verify($password, $userDatas['password'])){
        	$_SESSION['IdConnectedUser'] = $userDatas['id'];
        	header('location:accueil');
        	exit;
        // or create a error message
        }else{
            $error['connexion'] ='Mot de passe ou email incorect.';
        }
	}

	//form information in a table for simplicity with twig
    $form = [
    	"email" => $email ,
    	"password" => $password
    ];

    ////display the form with errors and datas form
	echo $this->twig->render('connexion.php', ['error' => $error, 'form' => $form, 'SESSION' => $_SESSION]);

	}
}