{% extends 'template.php' %}

{% block page_title %}
<title>Inscription</title>
{% endblock %}

{% block content %}
<div class="container">
	<h2>Inscription</h2>

	<p>Pour pouvoir créer et répondre aux articles, vous devez vous inscrire avec le formulaire ci-dessous. </p>
	<p>Déjà inscrit ? <a href="connexion">Connectez-vous !</a></p>

	<form method="post" action="inscription" >
		<div class="form-group">
			<label for="pseudo">Quel est votre pseudo ?</label>
			<input class="form-control" type="text" name="pseudo" id="pseudo" value="{{form.pseudo}}" />
			<small class="text-danger">{{ error.pseudo }} {{ error.pseudoSize }} {{ error.sql }}</small>
		</div>
		<div class="form-group">
			<label for="email">Quel est votre email ?</label>
			<input class="form-control" type="email" name="email" id="email" value="{{form.email}}" />
			<small class="text-danger">{{ error.email }} {{ error.sql }}</small>
		</div>
		<div class="form-group">
			<label for="password">Quel est votre mot de passe ?</label>
			<input class="form-control" type="password" name="password" id="password" value="{{form.password}}"/>
			<small class="text-danger">{{ error.password }}</small>
		</div>
		<div class="form-group">
			<label for="confirm_password">Confirmation du mot de passe</label>
			<input class="form-control" type="password" name="confirm_password" id="confirm_password" value="{{form.confirm_password}}"/>
			<small class="text-danger">{{ error.confirm_password }}</small>
		</div>
		<input class="btn btn-primary" type="submit" value="Valider">
	</form>
</div>

{% endblock %}