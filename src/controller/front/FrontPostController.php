<?php

namespace Projet5\controller\front;

use Projet5\controller\TwigController;

class FrontPostController extends TwigController{


	public function displayPosts($postModel){
		$posts = $postModel->loadAllPost($valide='yes');
		echo $this->twig->render('blogPosts.php', ['SESSION' => $_SESSION , 'posts' => $posts]);
	}

	public function displayPost($postModel,$commentModel, $idPost){

		//load the post
		$post = $postModel->loadPost($idPost);

		//if post not valide display a error message
		if ($post['validate']=='no'){
			header('location:erreur-001');
			exit;
		}

		//load comments for this post
		$comments = $commentModel->loadAllCommentsWithIdPost($idPost);

		//display post and comments
		echo $this->twig->render('post.php', [	'SESSION' => $_SESSION,
												'post' => $post,
												'comments' => $comments
											]);
	}
}