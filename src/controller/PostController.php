<?php

namespace Projet5\controller;

class PostController extends Controller{

	private $idArticle;

	public function run($idArticle){
		$this->idArticle = $idArticle;

		echo $this->twig->render('post.php', ['idArticle' => $this->idArticle]);
	}
}