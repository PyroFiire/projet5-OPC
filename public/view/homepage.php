
<p>page d'accueil avec twig</p>
<p>affichage d'une variable : {{name}}<p> 


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Le blog de Christophe Guinot">
    <meta name="author" content="Christophe Guinot">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Personal CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Page title -->
    <title>le BLOG de Christophe Guinot</title>
  </head>
  <body>
    Menu
      <!-- HEADER -->
      <header>
        <div class="container">
          <img id="avatar" src="public/pictures/avatar.svg">
          <h1>Christophe Guinot</h1>
          <p>Le développeur qu'il vous faut !</p>
          <a href="pdf/cv.pdf">Voir le CV !</a>
        </div>
      </header>

      <!-- FORM -->
      <form method="post" action="#">
        <div class="container">
          <h2>Formulaire de contact</h2>
          <div id="name" class="row">
            <label class="col-3" for="firstname">Prénom :</label>
            <input class="col-3" type="text" name="firstname" id="firstname" value="PHPidFirstname"/>
            <label class="col-3" for="lastname">Nom :</label>
            <input class="col-3" type="text" name="lastname" id="lastname" value="PHPidLastname"/>
            <label class="col-3" for="email">Email :</label>
            <input class="col-3" type="email" name="email" id="email" value="PHPidEmail"/>
            <div class="offset-6"></div>
            <label class="col-3" for="message">Votre message :</label>
            <textarea class="col-9" name="message" id="message" rows="3"></textarea>
            <input class="col-2 offset-5" type="submit" value="Envoyer">
          </div>
      </form>

      <!-- FOOTER -->
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
              <h3>Menu</h3>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
              <h3>Réseaux sociaux</h3>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
              <h3>A propos</h3>
            </div>
          </div>
        </div>
      </footer>
  </body>
</html>