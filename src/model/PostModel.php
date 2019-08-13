<?php

namespace Projet5\model;

class PostModel extends Model {

    //load all posts , param valide 'yes' or 'no'
    public function loadAllPost($valide, $startLimit = 0, $numberPerPage = 20) {
        $req = $this->pdo->prepare('SELECT blog_posts.id, title, last_date_change, standfirst,contents, users.pseudo FROM `blog_posts` LEFT JOIN users ON blog_posts.ref_id_users = users.id WHERE validate = :validate ORDER BY last_date_change DESC LIMIT :startLimit , :numberPerPage ');
        $req->bindValue(  ':validate', $valide );
        $req->bindValue(  ':startLimit', $startLimit, \PDO::PARAM_INT );
        $req->bindValue(  ':numberPerPage', $numberPerPage, \PDO::PARAM_INT );
        $req->execute();
	    return $req;
    }
    //load all posts , param valide 'yes' or 'no'
    public function countAllPost($valide) {
        $req = $this->pdo->prepare('SELECT id FROM `blog_posts` WHERE validate = :validate');
        $req->bindValue(  ':validate', $valide );
        $req->execute();
        return $req;
    }
    //load post with id
    public function loadPost($idPost){
    	$req = $this->pdo->prepare('SELECT blog_posts.id, title, last_date_change, standfirst, contents, validate, users.pseudo from blog_posts LEFT JOIN users ON blog_posts.ref_id_users = users.id WHERE blog_posts.id = :idPost');
    	$req->bindValue(':idPost', $idPost);
    	$req->execute();
    	$row = $req->fetch($this->pdo::FETCH_ASSOC);
    	return $row;
    }
    public function insertPost(array $datas) {
        $req = $this->pdo->prepare('INSERT INTO blog_posts(title, last_date_change, standfirst, contents, validate, ref_id_users) VALUES(:title, NOW(), :standfirst, :contents, :validate, :id_user)');
            $req->bindValue(  ':title', $datas['title'] );
            $req->bindValue(  ':standfirst', $datas['standfirst'] );
            $req->bindValue(  ':contents', $datas['contents'] );
            $req->bindValue(  ':validate', 'no' );
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

    public function validatePostWithId($idPost) {
    $req = $this->pdo->prepare('UPDATE blog_posts SET validate=:validate WHERE id=:idPost');
        $req->bindValue(  ':validate', 'yes' );
        $req->bindValue(  ':idPost', $idPost );
    $req->execute();
    }

    public function deletePostWithId($idPost) {
    $req = $this->pdo->prepare('DELETE FROM blog_posts WHERE id=:idPost');
        $req->bindValue(  ':idPost', $idPost );
    $req->execute();
    }


}