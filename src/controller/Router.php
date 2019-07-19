<?php

namespace Projet5\controller;

use Projet5\controller\Router;
use Projet5\controller\front\HomepageController;
use Projet5\controller\front\UserController;
use Projet5\controller\front\FrontPostController;
use Projet5\controller\back\BackPostController;
use Projet5\controller\back\CommentController;

use Projet5\model\UserModel;
use Projet5\model\PostModel;
use Projet5\model\CommentModel;

class Router{

	public function run(){

		// Configuration and global variables
		require("config.php");

		//Models variables
		$userModel = new UserModel($dataBase);
		$postModel = new PostModel($dataBase);
		$commentModel = new CommentModel($dataBase);


		//Router
		$url = '';
		if(isset($_GET['url'])){
			$url = explode('/', strtolower($_GET['url']));
		}

		/*Accueil*/
		if($url=='' || $url[0]=='accueil'){
			$homepageController = new HomepageController();
			$homepageController->index($userModel);

		/*Les Articles*/
		} elseif(preg_match('#^articles?$#', $url[0])){
			$postController = new FrontPostController();
			$postController->displayPosts($postModel);

		/*Un article-id with this comments*/
		} elseif(preg_match('#^articles?-([0-9]+)$#', $url[0], $params)){
			$idPost = $params[1];
			$postController = new FrontPostController();
			$postController->displayPost($postModel, $commentModel, $idPost);

		/*ajouter-un-commentaire-idPost*/
		} elseif(preg_match('#^ajouter-un-commentaire-([0-9]+)$#', $url[0], $params)){
			$idPost = $params[1];
			$commentController = new CommentController();
			$commentController->insertComment($postModel, $commentModel, $idPost);

		/*ajouter-un-article*/
		} elseif($url[0] == 'ajouter-un-article'){
			$postController = new BackPostController();
			$postController->addPost($postModel);

		/*modifier-article-id*/
		} elseif(preg_match('#^modifier-article-([0-9]+)$#', $url[0], $params)){
			$idPost = $params[1];
			$postController = new BackPostController();
			$postController->editPost($idPost, $postModel);

		/*connexion*/
		} elseif($url[0]=='connexion'){
			$userController = new UserController();
			$userController->connexion($userModel);
		/*inscription*/
		} elseif($url[0]=='inscription'){
			$userController = new UserController();
			$userController->register($userModel);
		/*inscription*/
		} elseif($url[0]=='deconnexion'){
			$userController = new UserController();
			$userController->deconnexion();
		} else {
			echo 'Erreur 404';
		}
	}
}