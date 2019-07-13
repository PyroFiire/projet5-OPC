<?php

namespace Projet5\controller;

class AddPostController extends Controller{

	public function run($postModel){

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

		echo $this->twig->render('addPost.php', ['SESSION' => $_SESSION]);
	}
}