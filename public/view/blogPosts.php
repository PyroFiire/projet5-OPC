{% extends 'template.php' %}

{% block page_title %}
<title>Les articles</title>
{% endblock %}

{% block content %}

<div class="container">
    <div class="row">
        {% for post in posts %}
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="Article-{{ post.id }}-page1">{{ post.title }}</a></h5>
                        <p class="card-text">{{ post.standfirst }}</p>
                        <h6 class="card-subtitle mb-2 text-muted">Ecrit par {{ post.pseudo }}</h6>
                        <p class="card-text">
                            <small class="text-muted">
                                Dernière modification le {{ post.last_date_change|date("d/m/Y à H:i") }}  
                            </small>
                        </p>
                    </div>
                    {% if SESSION.pseudoConnectedUser == post.pseudo %}
                    <div class="card-footer">
                        <a class="card-link" href="Modifier-Article-{{ post.id }}">Modifier</a>
                        <a class="card-link" href="Supprimer-Article-{{ post.id }}">Supprimer</a>
                    </div>
                    {% endif %}
                </div>
            </div>
        {% endfor %}
    </div>
</div>



    


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