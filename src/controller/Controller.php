<?php

namespace Projet5\controller;

class Controller{

	protected $twig;

	public function __construct(){
		//twig
		$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../view');
		$twig = new \Twig\Environment($loader, [
		    'cache' => false //__DIR__ .'/tmp'
		]);
		$this->twig = $twig;
	}
	
}