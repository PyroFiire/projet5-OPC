<?php
require 'vendor/autoload.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', function(){echo 'accueil';});
$router->get('/posts', function(){echo 'tous les articles';});
$router->get('/posts/:id', function($id){
?>
	<form action="" method="post">
		<input type="text" name="name">
		<button type="submit">Envoyer</button>
	</form>
<?php
});
$router->post('/posts/:id', function($id){echo 'Poster pour l\'article ' . $id . print_r($_POST, true);});

$router->run();

