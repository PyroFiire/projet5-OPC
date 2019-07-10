<?php

namespace Projet5\controller;

class BlogPostsController extends Controller{

	public function run($postModel){
		$posts = $postModel->loadAllPost();
		echo $this->twig->render('blogPosts.php', ['posts' => $posts]);
	}

}