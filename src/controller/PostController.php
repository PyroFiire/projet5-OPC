<?php

namespace Projet5\controller;

class PostController extends Controller{


	public function run($postModel,$commentModel, $idPost){

		//The form is submitted, insert the comment before display
	    if(count($_POST)!==0){

	    	$commentModel->insertComment([	'contents' => $_POST['contents'],
	    									'id_blog_post' => $idPost ,
	    									'id_user' => $_SESSION['IdConnectedUser']
	    								]);
	    }

		//load the post
		$post = $postModel->loadPost($idPost);

		//load comments for this post
		$comments = $commentModel->loadAllCommentsWithIdPost($idPost);

		echo $this->twig->render('post.php', [	'SESSION' => $_SESSION,
												'post' => $post,
												'comments' => $comments
											]);
	}
}