<?php

namespace Projet5\model;

class CommentModel extends Model {

    //load comments for one post
    public function loadAllCommentsWithIdPost($idPost, $startLimit ='0', $numberPerPage='50') {
        $req = $this->pdo->prepare('SELECT comments.id, contents, validate, users.pseudo FROM `comments` LEFT JOIN users ON comments.ref_id_users = users.id WHERE ref_id_blog_posts=:idPost ORDER BY comments.id DESC LIMIT :startLimit , :numberPerPage ');
        $req->bindValue(':idPost', $idPost);
        $req->bindValue(  ':startLimit', $startLimit, \PDO::PARAM_INT );
        $req->bindValue(  ':numberPerPage', $numberPerPage, \PDO::PARAM_INT );
        $req->execute();
	    return $req;
    }

    public function loadInvalidComments() {
        $req = $this->pdo->prepare('SELECT * FROM `comments` WHERE `validate`= "no" ');
        $req->execute();
        return $req;
    }

    public function insertComment(array $datas) {

    $req = $this->pdo->prepare('INSERT INTO comments(contents, validate, ref_id_blog_posts, ref_id_users) VALUES(:contents, :validate, :id_blog_post, :id_user)');
        $req->bindValue(  ':contents', $datas['contents'] );
		$req->bindValue(  ':validate', 'no' );
		$req->bindValue(  ':id_blog_post', $datas['id_blog_post'] );
		$req->bindValue(  ':id_user', $datas['id_user'] );
    $req->execute();
	}

    public function validateCommentWithId($idComment) {
        $req = $this->pdo->prepare('UPDATE Comments SET validate=:validate WHERE id=:idComment');
            $req->bindValue(  ':validate', 'yes' );
            $req->bindValue(  ':idComment', $idComment );
        $req->execute();
    }

    public function deleteCommentWithId($idComment) {
    $req = $this->pdo->prepare('DELETE FROM Comments WHERE id=:idComment');
        $req->bindValue(  ':idComment', $idComment );
    $req->execute();
    }
}