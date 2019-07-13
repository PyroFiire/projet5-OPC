{% extends 'template.php' %}

{% block page_title %}
<title>Modifier l'article numero {{post.id}} </title>
{% endblock %}

{% block content %}
<form method="post" action="Modifier-article-{{post.id}}" >
	<legend> Modifiez votre article</legend>
	<label for="title">Titre</label>
	<input type="text" name="title" id="title" value="{{post.title}}" />
	<br>
	<label for="standfirst">Châpo</label>
	<input type="text" name="standfirst" id="standfirst" value="{{post.standfirst}}" />
	<br>
	<label for="contents">Contenu</label>
	<textarea name="contents" id="contents">{{post.contents}}</textarea>
	<br>
	<input type="submit" value="Valider">
</form>
{% endblock %}