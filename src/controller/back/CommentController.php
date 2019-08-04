<?php

namespace Projet5\controller\back;

class CommentController extends SessionController{


	public function insertComment($postModel,$commentModel, $idPost){

		//The form is not submitted, exit
    	if(count($_POST)===0){
	    	$_SESSION['error'] = 'Formulaire non soumis';
	        header('location:Article-'. $idPost .'-Page1');
	    	exit;
    	}

		//The form is submitted, control
    	$contents = (isset($_POST['contents'])) ? $_POST['contents'] : "" ;

    	if (strlen($contents)<1 || strlen($contents)>1000) {
        $error['contents'] ='Le commentaire n\'est pas renseigné ou invalide. Maximum 1000 caractères';
    	}

    	//insert the comment and redirect
    	if (empty($error)){
	    	$commentModel->insertComment([	
	    		'contents' => $contents,
	    		'id_blog_post' => $idPost ,
	    		'id_user' => $_SESSION['IdConnectedUser']
	    	]);
	    	//redirect on post
	    	$_SESSION['success'] = 'Votre commentaire à été envoyé, il est en attente de validation par un administrateur';
	    	header('location:Article-'. $idPost .'-Page1');
	    	exit;
	    } else {
	    	//redirect on post with error
	    	$_SESSION['error'] = $error['contents'];
	    	header('location:Article-'. $idPost .'-Page1');
	    	exit;
	    	
		}
	}
}