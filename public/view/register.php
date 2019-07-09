{% extends 'template.php' %}

{% block page_title %}
<title>Inscription</title>
{% endblock %}

{% block content %}
<h2>Inscription</h2>

<p>Pour pouvoir créer et répondre aux articles, vous devez vous inscrire avec le formulaire ci-dessous. </p>
<p>Déjà inscrit ? <a href="connexion">Connectez-vous !</a></p>

<form action="inscription" method="post">
	<label for="pseudo">Quel est votre pseudo ?</label>
		<input type="text" name="pseudo" id="pseudo" value="{{form.pseudo}}" />
	<br>
		<label for="email">Quel est votre email ?</label>
		<input type="email" name="email" id="email" value="{{form.email}}" />
	<br>
		<label for="password">Quel est votre mot de passe ?</label>
		<input type="password" name="password" id="password" value="{{form.password}}"/>
	<br>
		<label for="confirm_password">Confirmation du mot de passe</label>
		<input type="password" name="confirm_password" id="confirm_password" value="{{form.confirm_password}}"/>
	<br>
		<input type="submit" value="Valider">
</form>
<p>
{{ error.sql }}
{{ error.pseudo }}
{{ error.pseudoSize }}
{{ error.email }}
{{ error.password }}
{{ error.confirm_password }}

</p>
{% endblock %}