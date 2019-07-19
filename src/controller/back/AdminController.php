<?php

namespace Projet5\controller\back;

class AdminController extends SessionController{

	public function display($userModel){
		//if not admin, exit
	    if($_SESSION['rankConnectedUser']!=='admin'){
	    	header('location:erreur-403');
	    	exit;
	    }

	    //valide if form is submit
	    if(isset($_POST['idValidateUser'])){
	    	$userModel->validateUserWithId($_POST['idValidateUser']);
	    }
	    //delete if form is submit
	    if(isset($_POST['idDeleteUser'])){
	    	$userModel->deleteUserWithId($_POST['idDeleteUser']);
	    }

	    //load pending users
	    $pendingUsers = $userModel->loadPendingUsers();

	    //display 
		echo $this->twig->render('admin.php', ['SESSION' => $_SESSION, 'pendingUsers' => $pendingUsers]);
	}
}