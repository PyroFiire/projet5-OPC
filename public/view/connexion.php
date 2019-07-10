{% extends 'template.php' %}

{% block page_title %}
<title>Connexion</title>
{% endblock %}

{% block content %}
<form action="connexion" method="post">
	<label for="email">Quel est votre email ?</label>
	<input type="email" name="email" id="email" value="{{form.email}}"/>
	<br>
	<label for="password">Quel est votre mot de passe ?</label>
	<input type="password" name="password" id="password" value="{{form.password}}"/>
	<br>
	<input type="submit" name="envoyer">
</form>

<p>Pas encore inscrit ? <a href="inscription">Inscrivez-vous ici !</a></p>
<!--errors-->
<p>
{{ error.email }}
{{ error.password}}
{{ error.connexion}}
</p>
{% endblock %}