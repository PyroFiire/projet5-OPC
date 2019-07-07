<?php

namespace Projet5\controller;

class EditPostController extends Controller{

	private $idArticle;

	public function run($idArticle){
		$this->idArticle = $idArticle;

		echo $this->twig->render('editPost.php', ['idArticle' => $this->idArticle]);
	}
}