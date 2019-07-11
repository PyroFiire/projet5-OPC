<?php

namespace Projet5\model;

class CommentModel extends Model {

    //load comments for one post
    public function loadAllCommentsWithIdPost($idPost) {
        $req = $this->pdo->prepare('SELECT comments.id, contents, validate, users.pseudo FROM `comments` LEFT JOIN users ON comments.ref_id_users = users.id WHERE ref_id_blog_posts=:idPost ORDER BY comments.id DESC ');
        $req->bindValue(':idPost', $idPost);
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
}