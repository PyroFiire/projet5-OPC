{% extends 'template.php' %}

{% block page_title %}
<title>Connexion</title>
{% endblock %}

{% block content %}
<div class="container">
	<h2>Connexion</h2>
	<p>Pas encore inscrit ? <a href="inscription">Inscrivez-vous ici !</a></p>
	<form method="post" action="connexion">
		<div class="form-group">
			<label for="email">Quel est votre email ?</label>
			<input class="form-control" type="email" name="email" id="email" value="{{form.email}}"/>
			<small class="text-danger">{{ error.email }} {{ error.connexion}}</small>
		</div>
		<div class="form-group">
			<label for="password">Quel est votre mot de passe ?</label>
			<input class="form-control" type="password" name="password" id="password" value="{{form.password}}"/>
			<small class="text-danger">{{ error.password}} {{ error.connexion}}</small>
		</div>
		<input class="btn btn-primary" type="submit" value="Connexion">
	</form>
</div>
{% endblock %}