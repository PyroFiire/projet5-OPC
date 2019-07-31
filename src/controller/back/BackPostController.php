<?php

namespace Projet5\controller\back;

class BackPostController extends SessionController{

	public function addPost($postModel){

		//The form is submitted, insert the post
	    if(count($_POST)!==0){

	    	$postModel->insertPost([	'title' => $_POST['title'],
	    								'standfirst' => $_POST['standfirst'] ,
	    								'contents' => $_POST['contents'] ,
	    								'id_user' => $_SESSION['IdConnectedUser']
	    							]);
	    	$_SESSION['success'] = 'L\'article à bien été envoyé, il est maintenant en attente de validation par un administrateur';
	    	header('location:Accueil');
	    	exit;
	    }
	    //display the form
		echo $this->twig->render('insertPost.php', ['SESSION' => $_SESSION, 'add' => 'add']);
	}

	public function editPost($idPost,$postModel){

		//load Post with id
	    $post = $postModel->loadPost($idPost);

	    //if the user hasn't this post
	    if($post['pseudo']!==$_SESSION['pseudoConnectedUser']){
	    	$_SESSION['error'] = 'Vous n\'êtes pas le propriétaire de cet article';
	    	header('location:Articles-Page1');
	    	exit;
	    }
		//The form is submitted, update the post
	    if(count($_POST)!==0){
	    	$postModel->updatePost($idPost,[
	    		'title' => $_POST['title'],
	    		'standfirst' => $_POST['standfirst'],
	    		'contents' => $_POST['contents']
	    		]);
	    	$_SESSION['success'] = 'L\'article à été mis à jour';
	    	header('location:Article-'.$post['id'].'-page1');
	    	exit;
	    }

	    //display the post
		echo $this->twig->render('insertPost.php', ['SESSION' => $_SESSION, 'post' => $post, 'edit'=> 'edit']);
	}

	public function deletePost($idPost,$postModel){

		//load Post with id
	    $post = $postModel->loadPost($idPost);

	    //if the user hasn't this post, exit
	    if($post['pseudo']!==$_SESSION['pseudoConnectedUser']){
	    	$_SESSION['error'] = 'Vous n\'êtes pas le propriétaire de cet article';
	    	header('location:Articles-Page1');
	    	exit;
	    }

	    //delete post if form is submit and redirect
	    if(isset($_POST['idDeletePost'])){
	    	$postModel->deletePostWithId($_POST['idDeletePost']);
	    	$_SESSION['success'] = 'L\'article à été supprimé';
	    	header('location:Articles-Page1');
	    	exit;
	    }

	    //display the confirm delete message
		echo $this->twig->render('deletePost.php', ['SESSION' => $_SESSION, 'post' => $post]);
	}
}