<?php

namespace Projet5\controller;

class AddPostController extends Controller{

	public function run(){
		echo $this->twig->render('addPost.php', ['SESSION' => $_SESSION]);
	}
}