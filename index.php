<?php

use Projet5\controller\HomepageController;
use Projet5\controller\BlogPostsController;
use Projet5\controller\PostController;
use Projet5\controller\AddPostController;
use Projet5\controller\EditPostController;
use Projet5\controller\ConnexionController;
use Projet5\controller\RegisterController;
use Projet5\controller\DeconnexionController;

//Loader
include(__DIR__."/app/loader.php");

//ROUTER
$url = '';
if(isset($_GET['url'])){
	$url = explode('/', strtolower($_GET['url']));
}

/*Accueil*/
if($url=='' || $url[0]=='accueil'){
	$homepageController = new HomepageController();
	$homepageController->run($userModel);

/*Les Articles*/
} elseif(preg_match('#^articles?$#', $url[0])){
	$blogPostsController = new BlogPostsController();
	$blogPostsController->run($postModel);

/*Un article-id*/
} elseif(preg_match('#^articles?-([0-9]+)$#', $url[0], $params)){
	$idPost = $params[1];
	$postController = new PostController();
	$postController->run($postModel, $commentModel, $idPost);

/*ajouter-un-article*/
} elseif($url[0] == 'ajouter-un-article'){
	$addPostController = new AddPostController();
	$addPostController->run();

/*modifier-article-id*/
} elseif(preg_match('#^modifier-article-([0-9]+)$#', $url[0], $params)){
	$idPost = $params[1];
	$editPostController = new EditPostController();
	$editPostController->run($idPost);

/*connexion*/
} elseif($url[0]=='connexion'){
	$connexionController = new ConnexionController();
	$connexionController->run($userModel);
/*inscription*/
} elseif($url[0]=='inscription'){
	$registerController = new RegisterController();
	$registerController->run($userModel);
/*inscription*/
} elseif($url[0]=='deconnexion'){
	$registerController = new DeconnexionController();
	$registerController->run();
} else {
	echo 'Erreur 404';
}

