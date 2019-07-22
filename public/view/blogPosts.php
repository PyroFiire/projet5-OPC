{% extends 'template.php' %}

{% block page_title %}
<title>Les articles</title>
{% endblock %}

{% block content %}
<p>La liste des articles (blog posts)</p>

<ul>
    {% for post in posts %}
    <li>
        <a href="Article-{{ post.id }}">{{ post.title }}</a><br>
        {{ post.standfirst }}<br>
        <p>Dernière modification le {{ post.last_date_change|date("d/m/Y à H:i") }} par  {{ post.pseudo }} 
        {% if SESSION.pseudoConnectedUser == post.pseudo %}
        <a href="Modifier-Article-{{ post.id }}">Modifier</a>
        <a href="Supprimer-Article-{{ post.id }}">Supprimer</a>
        {% endif %}
    	</p>
	</li>
    {% endfor %}
</ul>

<h2>Pagination</h2>
<p>
    {% for page in 1..paging.totalPages %}
        {% if page == paging.currentPage %}
            {{page}}
        {% else %}
            <a href="Articles-Page{{page}}">{{page}}</a>
        {% endif %}
    {% endfor %}
</p>



{% endblock %}