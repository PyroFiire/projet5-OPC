<?php

namespace Projet5\model;

class PostModel extends Model {

    //load all posts
    public function loadAllPost() {
        $req = $this->pdo->prepare('SELECT * FROM `blog_posts` ');
        $req->execute();
	    return $req;
    }
}