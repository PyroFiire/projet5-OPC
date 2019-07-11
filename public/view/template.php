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
    {% block page_title %}{% endblock %}
  </head>
  <body>
      <!-- MENU -->
      <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler col-12" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="Accueil">Accueil</a>
            <a class="nav-item nav-link" href="Articles">Les articles</a>
            {% if SESSION.IdConnectedUser is defined %}
              <a class="nav-item nav-link" href="Ajouter-un-article">Ecrire votre article</a>
              <a class="nav-item nav-link" href="Deconnexion">Déconnexion</a>
            {% else %}
            <a class="nav-item nav-link" href="Connexion">Connexion</a>
            <a class="nav-item nav-link" href="Inscription">Inscription</a>
            {% endif %}
          </div>
        </div>
      </nav>
      {% block content %}{% endblock %}
      <!-- FOOTER -->
      <footer class="container">
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
      </footer>
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>