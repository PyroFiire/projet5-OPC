<?php

namespace Projet5\model;


//Cette classe à la charge de charger et décharger les utilisateurs depuis une base de données


class UserModel extends Model {

    //charge un utilisateur
/*    public function load($id) {

	    $req = $this->_pdo->prepare('SELECT * FROM `users` WHERE `id`= :id;');
	    $req->execute(['id'=>$id]);
	    $userDatas = $req->fetch(PDO::FETCH_ASSOC);

	    return $userDatas;
    }

	//Return l'id de l'utilisateur grâce à son email
    public function loadByEmail(string $email) {
	    $req = $this->pdo->prepare('SELECT id FROM Users WHERE email = :email');
        $req->bindValue(':email', $email );
	    $req->execute();
        
	    $row = $req->fetch(PDO::FETCH_ASSOC);
	    return $this->load($row['id']);
        
    }
*/

    //insert un utilisateur grâce à son tableau de datas
    public function insert(array $datas) {

        $req = $this->pdo->prepare('INSERT INTO users(pseudo, email, password, rank) VALUES(:pseudo, :email, :password, :rank)');
            $req->bindValue(  ':pseudo', $datas['pseudo'] );
    		$req->bindValue(  ':email', $datas['email'] );
    		$req->bindValue(  ':password', password_hash($datas['password'], PASSWORD_DEFAULT) );
    		$req->bindValue(  ':rank', 'inscrit' );
        $req->execute();
    }
}