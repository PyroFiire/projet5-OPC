<?php

namespace Projet5\controller;

class HomepageController extends Controller{

	public function run(){
		echo $this->twig->render('homepage.php', ['name' => 'Fabien']);
	}
}