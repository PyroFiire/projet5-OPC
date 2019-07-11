<?php

namespace Projet5\model;

class PostModel extends Model {

    //load all posts
    public function loadAllPost() {
        $req = $this->pdo->prepare('SELECT blog_posts.id, title, last_date_change, standfirst, users.pseudo FROM `blog_posts` LEFT JOIN users ON blog_posts.ref_id_users = users.id');
        $req->execute();
	    return $req;
    }
}