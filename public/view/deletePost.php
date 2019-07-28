{% extends 'template.php' %}

{% block page_title %}
<title>Supprimer un article</title>
{% endblock %}

{% block content %}

<p>Voulez vous vraiment supprimer l'article ?</p>
<form method="post" action="Supprimer-Article-{{post.id}}">
    <button type="submit" name="idDeletePost" value="{{post.id}}">Valider</button>
</form>


{% endblock %}