<?php

namespace Projet5\controller\back;

class BackPostController extends SessionController{

	public function addPost($postModel){

		//The form is submitted, insert the post
	    if(count($_POST)!==0){

	    	$postModel->insertPost([	'title' => $_POST['title'],
	    								'standfirst' => $_POST['standfirst'] ,
	    								'contents' => $_POST['contents'] ,
	    								'id_user' => $_SESSION['IdConnectedUser']
	    							]);

	    	$lastIdPost = $postModel->LastInsertId();
	    	header('location:Article-'.$lastIdPost);
	    	exit;
	    }
	    //display the form
		echo $this->twig->render('addPost.php', ['SESSION' => $_SESSION]);
	}

	public function editPost($idPost,$postModel){

		//load Post with id
	    $post = $postModel->loadPost($idPost);

	    //if the user hasn't this post
	    if($post['pseudo']!==$_SESSION['pseudoConnectedUser']){
	    	header('location:erreur-403');
	    	exit;
	    }
		//The form is submitted, update the post
	    if(count($_POST)!==0){
	    	$postModel->updatePost($idPost,[
	    		'title' => $_POST['title'],
	    		'standfirst' => $_POST['standfirst'],
	    		'contents' => $_POST['contents']
	    		]);
	    }

	    //display the post or post changed
		echo $this->twig->render('editPost.php', ['SESSION' => $_SESSION, 'post' => $post]);
	}
}