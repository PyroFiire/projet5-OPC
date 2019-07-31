<?php

namespace Projet5\controller\back;

class CommentController extends SessionController{


	public function insertComment($postModel,$commentModel, $idPost){

		//The form is submitted, insert the comment and redirect
	    if(count($_POST)!==0){

	    	$commentModel->insertComment([	
	    		'contents' => $_POST['contents'],
	    		'id_blog_post' => $idPost ,
	    		'id_user' => $_SESSION['IdConnectedUser']
	    	]);
	    	//redirect on post
	    	$_SESSION['success'] = 'Votre commentaire à été envoyé, il est en attente de validation par un administrateur';
	    	header('location:Article-'. $idPost .'-Page1');
	    	exit;
	    }
	}
}