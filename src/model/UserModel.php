<?php

namespace Projet5\model;

class UserModel extends Model {

    //load user
    public function load($id) {

	    $req = $this->pdo->prepare('SELECT * FROM `users` WHERE `id`= :id;');
	    $req->execute(['id'=>$id]);
	    $userDatas = $req->fetch(\PDO::FETCH_ASSOC);

	    return $userDatas;
    }

	//Return id users with email
    public function loadByEmail(string $email) {
	    $req = $this->pdo->prepare('SELECT id FROM Users WHERE email = :email');
        $req->bindValue(':email', $email );
	    $req->execute();
        
	    $row = $req->fetch(\PDO::FETCH_ASSOC);
	    return $this->load($row['id']);
        
    }


    //insert user with datas table
    public function insert(array $datas) {

        $req = $this->pdo->prepare('INSERT INTO users(pseudo, email, password, rank) VALUES(:pseudo, :email, :password, :rank)');
            $req->bindValue(  ':pseudo', $datas['pseudo'] );
    		$req->bindValue(  ':email', $datas['email'] );
    		$req->bindValue(  ':password', password_hash($datas['password'], PASSWORD_DEFAULT) );
    		$req->bindValue(  ':rank', 'inscrit' );
        $req->execute();
    }
}