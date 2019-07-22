<?php

namespace Projet5\controller\back;

class AdminController extends SessionController{

	public function display($userModel, $postModel, $commentModel){
		//if not admin, exit
	    if($_SESSION['rankConnectedUser']!=='admin'){
	    	header('location:erreur-403');
	    	exit;
	    }

	    //valide user if form is submit
	    if(isset($_POST['idValidateUser'])){
	    	$userModel->validateUserWithId($_POST['idValidateUser']);
	    }
	    //delete user if form is submit
	    if(isset($_POST['idDeleteUser'])){
	    	$userModel->deleteUserWithId($_POST['idDeleteUser']);
	    }

	    //valide post if form is submit
	    if(isset($_POST['idValidatePost'])){
	    	$postModel->validatePostWithId($_POST['idValidatePost']);
	    }
	    //delete post if form is submit
	    if(isset($_POST['idDeletePost'])){
	    	$postModel->deletePostWithId($_POST['idDeletePost']);
	    }

	    //valide comment if form is submit
	    if(isset($_POST['idValidateComment'])){
	    	$commentModel->validateCommentWithId($_POST['idValidateComment']);
	    }
	    //delete comment if form is submit
	    if(isset($_POST['idDeleteComment'])){
	    	$commentModel->deleteCommentWithId($_POST['idDeleteComment']);
	    }

	    //load pending users
	    $pendingUsers = $userModel->loadPendingUsers();
	    //load invalide posts
	    $invalidePosts = $postModel->loadAllPost($valide='no');
	    //load invalide comments
	    $invalideComments = $commentModel->loadInvalidComments();

	    //display 
		echo $this->twig->render('admin.php', [
			'SESSION' => $_SESSION,
			'pendingUsers' => $pendingUsers,
			'invalidePosts' => $invalidePosts,
			'invalideComments' => $invalideComments
		]);
	}
}