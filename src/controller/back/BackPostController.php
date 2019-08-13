<?php

namespace Projet5\controller\back;

class BackPostController extends SessionController{

	public function addPost($postModel){

		//The form is not submitted, posting the post form
    	if(count($_POST)===0){
	        echo $this->twig->render('insertPost.twig', ['SESSION' => $_SESSION, 'add' => 'add']);
	        return;
    	}

		//The form is submitted, control
    	$title = (isset($_POST['title'])) ? $_POST['title'] : "" ;
    	$standfirst = (isset($_POST['standfirst'])) ? $_POST['standfirst'] : "" ;
		$contents = (isset($_POST['contents'])) ? $_POST['contents'] : "" ;
		$id_user = (isset($_SESSION['IdConnectedUser'])) ? $_SESSION['IdConnectedUser'] : "" ;
   		
   		if (strlen($title)<1 || strlen($title)>100) {
        $error['title'] ='Le titre n\'est pas renseigné ou invalide. Maximum 100 caractères';
    	}
    	if (strlen($standfirst)<1 || strlen($standfirst)>300) {
        $error['standfirst'] ='Le chapô n\'est pas renseigné ou invalide. Maximum 300 caractères';
    	}
		if (strlen($contents)<1 || strlen($contents)>2000) {
        $error['contents'] ='Le contenu n\'est pas renseigné ou invalide. Maximum 2000 caractères';
    	}

    	//insert post if control ok
    	if (empty($error)) {
	    	$postModel->insertPost([	
	    		'title' => $title ,
				'standfirst' => $standfirst ,
				'contents' => $contents ,
				'id_user' => $id_user
			]);

	    	$_SESSION['success'] = 'L\'article à bien été envoyé, il est maintenant en attente de validation par un administrateur';
	    	header('location:Accueil');
	    	exit;
        }

		//form information in a table for simplicity with twig
	    $form = [
	    	'title' => $title ,
	    	'standfirst' => $standfirst ,
	    	'contents' => $contents ,
	    	'id_user' => $id_user
	    ];

	    //display the form with errors and datas form
		echo $this->twig->render('insertPost.twig', ['error' => $error, 'form' => $form, 'SESSION' => $_SESSION, 'add' => 'add']);
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
	    //The form is not submitted, posting the post form
    	if(count($_POST)===0){
	        echo $this->twig->render('insertPost.twig', ['SESSION' => $_SESSION, 'post' => $post, 'edit'=> 'edit']);
	        return;
    	}

    	//The form is submitted, control
    	$title = (isset($_POST['title'])) ? $_POST['title'] : "" ;
    	$standfirst = (isset($_POST['standfirst'])) ? $_POST['standfirst'] : "" ;
		$contents = (isset($_POST['contents'])) ? $_POST['contents'] : "" ;

   		if (strlen($title)<1 || strlen($title)>100) {
        $error['title'] ='Le titre n\'est pas renseigné ou invalide. Maximum 100 caractères';
    	}
    	if (strlen($standfirst)<1 || strlen($standfirst)>300) {
        $error['standfirst'] ='Le chapô n\'est pas renseigné ou invalide. Maximum 300 caractères';
    	}
		if (strlen($contents)<1 || strlen($contents)>2000) {
        $error['contents'] ='Le contenu n\'est pas renseigné ou invalide. Maximum 2000 caractères';
    	}

		//if no error, update the post
	    if(empty($error)){
	    	$postModel->updatePost($idPost,[
	    		'title' => $title,
	    		'standfirst' => $standfirst,
	    		'contents' => $contents
	    		]);
	    	$_SESSION['success'] = 'L\'article à été mis à jour';
	    	header('location:Article-'.$post['id'].'-page1');
	    	exit;
	    }

	    //form information in a table for simplicity with twig
	    $form = [
	    	'title' => $title ,
	    	'standfirst' => $standfirst ,
	    	'contents' => $contents ,
	    	'id_post' => $idPost
	    ];

	    //display the post with error and datas form
		echo $this->twig->render('insertPost.twig', ['error' => $error, 'SESSION' => $_SESSION, 'form' => $form, 'edit'=> 'edit']);
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

		//Not delete post if form is cancel and redirect
	    if(isset($_POST['cancel'])){
	    	$cancel = $_POST['cancel'];
	    	header('location:Article-'. $cancel .'-page1');
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
		echo $this->twig->render('deletePost.twig', ['SESSION' => $_SESSION, 'post' => $post]);
	}
}