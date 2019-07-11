<?php

namespace Projet5\model;

class CommentModel extends Model {

    //load all posts
    public function loadAllCommentsWithIdPost($idPost) {
        $req = $this->pdo->prepare('SELECT comments.id, contents, validate, users.pseudo FROM `comments` LEFT JOIN users ON comments.ref_id_users = users.id WHERE ref_id_blog_posts=:idPost ORDER BY comments.id DESC ');
        $req->bindValue(':idPost', $idPost);
        $req->execute();
	    return $req;
    }
}