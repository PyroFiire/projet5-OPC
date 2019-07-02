<?php

namespace Projet5\controller;

class HomepageController{

	private $twig;

	public function __construct($twig){
		$this->twig = $twig;
	}
	public function run(){
		echo $this->twig->render('homepage.php', ['name' => 'Fabien']);
	}
}