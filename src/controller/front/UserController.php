<?php
namespace Projet5\controller\front;

use Projet5\controller\TwigController;

class UserController extends TwigController{

	public function connexion($userModel){

    //The form is not submitted, posting the connexion form
    if(count($_POST)===0){
        echo $this->twig->render('connexion.php');
        return;
    }
    //unset session for security and inialise $error
    unset($_SESSION['IdConnectedUser']);
    unset($_SESSION['pseudoConnectedUser']);
    unset($_SESSION['rankConnectedUser']);
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
            $_SESSION['pseudoConnectedUser'] = $userDatas['pseudo'];
            $_SESSION['rankConnectedUser'] = $userDatas['rank'];
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

    //display the form with errors and datas form
	echo $this->twig->render('connexion.php', ['error' => $error, 'form' => $form, 'SESSION' => $_SESSION]);

	}

    public function register($userModel){

        //The form is not submitted, posting the registration form
        if(count($_POST)===0){
            echo $this->twig->render('register.php');
            return;
        }

        //The form is submit, form processing
        
        $pseudo = (isset($_POST["pseudo"])) ? $_POST["pseudo"] : "" ;
        $email = (isset($_POST["email"])) ? $_POST["email"] :"" ;
        $password = (isset($_POST["password"])) ? $_POST["password"] :"";
        $confirm_password = (isset($_POST["confirm_password"])) ? $_POST["confirm_password"] :"";

        if (!preg_match('/^[[:print:]]+\z/', $pseudo)) {
            $error['pseudo'] ='Le pseudo n\'est pas renseigné ou invalide.';
        }
        if(strlen($pseudo)<3 || strlen($pseudo)>20 ){
            $error['pseudoSize'] = 'Le pseudo doit faire entre 3 et 20 caractères';
        }
        if (!preg_match('/^[[:print:]]+\z/', $email) && false == filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error['email'] ='L\'adresse email n\'est pas renseigné ou invalide.';
        }
        if (!preg_match('/^[[:print:]]+\z/', $password) || strlen($password)<8) {
            $error['password'] ='Le mot de passe n\'est pas renseigné ou invalide, minimum 8 caractères';
        }
        if ($password !== $confirm_password) {
            $error['confirm_password'] ='Le mot de passe de confirmation n\'est pas identique.';
        }

        //form information in a table for simplicity with twig
        $form = [
            "pseudo" => $pseudo ,
            "email" => $email ,
            "password" => $password ,
            "confirm_password" => $confirm_password
        ];

        //if no error, 
        if (empty($error)) {
            $userDatas = [
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => $password
            ];
            //regist in database and display connection
            try{
            $userModel->insert($userDatas);
            header('location:connexion');
            exit;
            // or create a new error_sql message
            }catch(\Exception $e){
                $error['sql'] = 'le pseudo ou l\'email existe déjà';
            }
        }
        //display the form with errors and datas form
        echo $this->twig->render('register.php', ['error' => $error, 'form' => $form, 'SESSION' => $_SESSION] );
    }

    public function deconnexion(){
        unset($_SESSION['IdConnectedUser']);
        session_destroy();
        header("Location:Accueil");
    }


}