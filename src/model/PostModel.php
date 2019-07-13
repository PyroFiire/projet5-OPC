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
    public function insertPost(array $datas) {
        $req = $this->pdo->prepare('INSERT INTO blog_posts(title, last_date_change, standfirst, contents, ref_id_users) VALUES(:title, NOW(), :standfirst, :contents, :id_user)');
            $req->bindValue(  ':title', $datas['title'] );
            $req->bindValue(  ':standfirst', $datas['standfirst'] );
            $req->bindValue(  ':contents', $datas['contents'] );
            $req->bindValue(  ':id_user', $datas['id_user'] );
        $req->execute();
    }

    public function updatePost($idPost, array $datas) {
        $req = $this->pdo->prepare('UPDATE blog_posts SET title=:title, last_date_change=NOW(), standfirst=:standfirst, contents=:contents WHERE id=:idPost');
            $req->bindValue(  ':title', $datas['title'] );
            $req->bindValue(  ':standfirst', $datas['standfirst'] );
            $req->bindValue(  ':contents', $datas['contents'] );
            $req->bindValue(  ':idPost', $idPost );
        $req->execute();
    }

    public function LastInsertId(){
        $lastInsertId = $this->pdo->lastInsertId();
        return $lastInsertId ;
    }
}