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
    	<input type="hidden" name="idValidateUser" value="{{pendingUser.id}}" />
    	<input type="submit" value="Valider">
    </form>
    <form method="post" action="Administration">
    	<input type="hidden" name="idDeleteUser" value="{{pendingUser.id}}" />
    	<input type="submit" value="Supprimer">
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
        <input type="hidden" name="idValidatePost" value="{{invalidePost.id}}" />
        <input type="submit" value="Valider">
    </form>
    <form method="post" action="Administration">
        <input type="hidden" name="idDeletePost" value="{{invalidePost.id}}" />
        <input type="submit" value="Supprimer">
    </form>
    {% endfor %}
</ul>
<h2>Commentaires</h2>
<ul>
    {% for invalideComment in invalideComments %}
    <li>{{invalideComment.contents}}</li>
    <form method="post" action="Administration">
        <input type="hidden" name="idValidateComment" value="{{invalideComment.id}}" />
        <input type="submit" value="Valider">
    </form>
    <form method="post" action="Administration">
        <input type="hidden" name="idDeleteComment" value="{{invalideComment.id}}" />
        <input type="submit" value="Supprimer">
    </form>
    {% endfor %}
</ul>
{% endblock %}
