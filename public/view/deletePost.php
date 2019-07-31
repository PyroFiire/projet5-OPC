{% extends 'template.php' %}

{% block page_title %}
<title>Supprimer un article</title>
{% endblock %}

{% block content %}
<div class="container">
	<div class="card">
        <div class="card-body">
            <h5 class="card-title">Voulez vous vraiment supprimer l'article ?</h5>
        </div>
        <form class="card-footer" method="post" action="Supprimer-Article-{{post.id}}">
            <button class="btn btn-primary" type="submit" name="idDeletePost" value="{{post.id}}">Valider</button>
        </form>
    </div>
</div>

{% endblock %}