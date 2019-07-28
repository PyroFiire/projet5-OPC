{% extends 'template.php' %}

{% block page_title %}
<title>Administration</title>
{% endblock %}

{% block content %}
<h2>Utilisateurs</h2>
<ul>
    {% for pendingUser in pendingUsers %}
    <li>{{pendingUser.pseudo}} / {{pendingUser.email}}</li>
	<form method="post" action="Administration">
    	<button type="submit" name="idValidateUser" value="{{pendingUser.id}}">Valider</button>
    	<button type="submit" name="idDeleteUser" value="{{pendingUser.id}}">Supprimer</button>
    </form>
    {% endfor %}
</ul>
<h2>Articles</h2>
<ul>
    {% for invalidePost in invalidePosts %}
    <li>
        Titre : {{invalidePost.title}}<br>
        Châpo : {{invalidePost.standfirst}}<br>
        Contenu : {{invalidePost.contents}}<br>
        Auteur : {{invalidePost.pseudo}}<br>
    </li>
    <form method="post" action="Administration">
        <button type="submit" name="idValidatePost" value="{{invalidePost.id}}">Valider</button>
        <button type="submit" name="idDeletePost" value="{{invalidePost.id}}">Supprimer</button>
    </form>
    {% endfor %}
</ul>
<h2>Commentaires</h2>
<ul>
    {% for invalideComment in invalideComments %}
    <li>{{invalideComment.contents}}</li>
    <form method="post" action="Administration">
        <button type="submit" name="idValidateComment" value="{{invalideComment.id}}">Valider</button>
        <button type="submit" name="idDeleteComment" value="{{invalideComment.id}}">Supprimer</button>
    </form>
    {% endfor %}
</ul>
{% endblock %}
