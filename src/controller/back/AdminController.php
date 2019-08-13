<?php

namespace Projet5\controller\back;

class AdminController extends SessionController{

	public function display($userModel, $postModel, $commentModel){
		//if not admin, exit
	    if($_SESSION['rankConnectedUser']!=='admin'){
	    	$_SESSION['error'] = 'Cette page est réservé à l\'administrateur';
	    	header('location:Accueil');
	    	exit;
	    }

	    //controle if a POST variable exist and execute
	    $this->controleForms($userModel, $postModel, $commentModel);

	    //load pending users
	    $pendingUsers = $userModel->loadPendingUsers();
	    //load invalide posts
	    $invalidePosts = $postModel->loadAllPost($valide='no');
	    //load invalide comments
	    $invalideComments = $commentModel->loadInvalidComments();

	    //display 
		echo $this->twig->render('admin.twig', [
			'SESSION' => $_SESSION,
			'pendingUsers' => $pendingUsers,
			'invalidePosts' => $invalidePosts,
			'invalideComments' => $invalideComments
		]);
	}

	private function controleForms($userModel, $postModel, $commentModel){

		//valide user if form is submit
	    if(isset($_POST['idValidateUser'])){
	    	$userModel->validateUserWithId($_POST['idValidateUser']);
	    	$_SESSION['success'] = 'L\'utilisateur a été validé';
	    	header('location:Administration');
	    	exit;
	    }
	    //delete user if form is submit
	    if(isset($_POST['idDeleteUser'])){
	    	$userModel->deleteUserWithId($_POST['idDeleteUser']);
	    	$_SESSION['success'] = 'L\'utilisateur a été supprimé';
	    	header('location:Administration');
	    	exit;
	    }

	    //valide post if form is submit
	    if(isset($_POST['idValidatePost'])){
	    	$postModel->validatePostWithId($_POST['idValidatePost']);
	    	$_SESSION['success'] = 'L\'article a été validé';
	    	header('location:Administration');
	    	exit;
	    }
	    //delete post if form is submit
	    if(isset($_POST['idDeletePost'])){
	    	$postModel->deletePostWithId($_POST['idDeletePost']);
	    	$_SESSION['success'] = 'L\'article a été supprimé';
	    	header('location:Administration');
	    	exit;
	    }

	    //valide comment if form is submit
	    if(isset($_POST['idValidateComment'])){
	    	$commentModel->validateCommentWithId($_POST['idValidateComment']);
	    	$_SESSION['success'] = 'Le commentaire a été validé';
	    	header('location:Administration');
	    	exit;
	    }
	    //delete comment if form is submit
	    if(isset($_POST['idDeleteComment'])){
	    	$commentModel->deleteCommentWithId($_POST['idDeleteComment']);
	    	$_SESSION['success'] = 'Le commentaire a été supprimé';
	    	header('location:Administration');
	    	exit;
	    }
	}
}