<?php

namespace Projet5\controller;

class PostController extends Controller{


	public function run($postModel,$commentModel, $idPost){

		$post = $postModel->loadPost($idPost);

		$comments = $commentModel->loadAllCommentsWithIdPost($idPost);

		echo $this->twig->render('post.php', ['post' => $post, 'comments' => $comments]);
	}
}