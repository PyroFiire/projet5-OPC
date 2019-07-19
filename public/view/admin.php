{% extends 'template.php' %}

{% block page_title %}
<title>Administration</title>
{% endblock %}

{% block content %}
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
{% endblock %}
