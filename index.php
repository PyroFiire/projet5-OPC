<?php
use Projet5\controller\HomepageController;
require 'vendor/autoload.php';


//twig

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/view');
$twig = new \Twig\Environment($loader, [
    'cache' => false //__DIR__ .'/tmp'
]);

//ROUTER
$url = '';
if(isset($_GET['url'])){
	$url = explode('/', strtolower($_GET['url']));
}

/*Accueil*/
if($url=='' || $url[0]=='accueil'){
	$homepageController = new HomepageController($twig);
	$homepageController->run();

/*Les Articles*/
} elseif(preg_match('#^articles?$#', $url[0])){
	echo 'Liste des articles';
/*Un article-id*/
} elseif(preg_match('#^articles?-([0-9]+)$#', $url[0], $params)){
	$idArticle = $params[1];
	var_dump($idArticle);
	echo 'Article numero ' . $idArticle;
/*ajouter-un-article*/
} elseif($url[0] == 'ajouter-un-article'){
	echo 'Ajouter-un-article';
/*modifier-article-id*/
} elseif(preg_match('#^modifier-article-([0-9]+)$#', $url[0], $params)){
	$idArticle = $params[1];
	var_dump($idArticle);
	echo 'Modifier l\'article numero ' . $idArticle;
/*connexion*/
} elseif($url[0]=='connexion'){
	echo 'Page de connexion';
/*inscription*/
} elseif($url[0]=='inscription'){
	echo 'Page d\'inscription';
} else {
	echo 'Erreur 404';
}

