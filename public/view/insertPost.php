{% extends 'template.php' %}

{% block page_title %}
	{% if add is defined %}
		<title>Ajouter-un-article</title>
	{% elseif edit is defined %}
		<title>Modifier l'article numero {{post.id}} </title>
	{% endif %}
{% endblock %}

{% block content %}
<div class="container">
	{% if add is defined %}
		<h2>Ecrivez votre article</h2>
	{% elseif edit is defined %}
		<h2>Modifier votre article</h2>
	{% endif %}

	{% if add is defined %}
		<form method="post" action="Ajouter-un-article" >
	{% elseif edit is defined %}
		<form method="post" action="Modifier-article-{{post.id}}" >
	{% endif %}
			<div class="form-group">
				<label for="title">Titre</label>
				<input class="form-control" type="text" name="title" id="title" {% if edit is defined %} value="{{post.title}}" {% endif %} />
			</div>
			<div class="form-group">
				<label for="standfirst">Châpo</label>
				<input class="form-control" type="text" name="standfirst" id="standfirst" {% if edit is defined %} value="{{post.standfirst}}" {% endif %}/>
			</div>
			<div class="form-group">
				<label for="contents">Contenu</label>
				<textarea class="form-control" name="contents" id="contents">{% if edit is defined %} {{post.contents}} {% endif %}</textarea>
			</div>
			<input class="btn btn-primary" type="submit" value="Envoyer">
		</form>
</div>
{% endblock %}


