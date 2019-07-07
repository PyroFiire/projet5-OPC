<?php

namespace Projet5\controller;

class BlogPostsController extends Controller{

	public function run(){
		echo $this->twig->render('blogPosts.php');
	}
}