<?php

namespace Projet5\controller;

class EditPostController extends Controller{


	public function run($idPost,$postModel){

		//The form is submitted, update the post
	    if(count($_POST)!==0){

	    	$postModel->updatePost($idPost,['title' => $_POST['title'],
	    									'standfirst' => $_POST['standfirst'] ,
	    									'contents' => $_POST['contents']
	    							]);
	    }

	    //load Post with id
	    $post = $postModel->loadPost($idPost);

	    //display the post or post changed
		echo $this->twig->render('editPost.php', ['SESSION' => $_SESSION, 'post' => $post]);
	}
}