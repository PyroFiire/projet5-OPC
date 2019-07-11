<?php

namespace Projet5\model;

class PostModel extends Model {

    //load all posts
    public function loadAllPost() {
        $req = $this->pdo->prepare('SELECT blog_posts.id, title, last_date_change, standfirst, users.pseudo FROM `blog_posts` LEFT JOIN users ON blog_posts.ref_id_users = users.id');
        $req->execute();
	    return $req;
    }
    public function loadPost($idPost){
    	$req = $this->pdo->prepare('SELECT blog_posts.id, title, last_date_change, standfirst, contents, users.pseudo from blog_posts LEFT JOIN users ON blog_posts.ref_id_users = users.id WHERE blog_posts.id = :idPost');
    	$req->bindValue(':idPost', $idPost);
    	$req->execute();
    	$row = $req->fetch($this->pdo::FETCH_ASSOC);
    	return $row;
    }
}