{% extends 'template.php' %}

{% block page_title %}
<title>Ajouter-un-article</title>
{% endblock %}

{% block content %}
<p>Ajouter-un-article</p>
<form method="post" action="Ajouter-un-article" >
	<legend> Ecrivez votre article</legend>
	<label for="title">Titre</label>
	<input type="text" name="title" id="title" />
	<br>
	<label for="standfirst">Châpo</label>
	<input type="text" name="standfirst" id="standfirst" />
	<br>
	<label for="contents">Contenu</label>
	<textarea name="contents" id="contents"></textarea>
	<br>
	<input type="submit" value="Valider">
</form>
{% endblock %}
