{% extends 'template.php' %}

{% block page_title %}
<title>{{post.title}} </title>
{% endblock %}

{% block content %}
<div class="container">
	<div class="card">
	    <div class="card-body">
	        <h5 class="card-title">{{ post.title }}</h5>
	        <p class="card-text">{{ post.standfirst }}</p>
	        <p class="card-text">{{ post.contents }}</p>
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

	<br>
	<!--display form if user is registered-->
	{% if SESSION.rankConnectedUser == 'registered' or SESSION.rankConnectedUser == 'admin'%}
		<form method="post" action="ajouter-un-commentaire-{{ post.id }}" >
			<div class="form-group">
	            <label for="comment">Saisissez votre commentaire</label>
	            <textarea class="form-control" name="contents" id="comment" value="{{userDatas.pseudo}}"></textarea>
	        </div>
	        <input class="btn btn-primary" type="submit" value="Envoyer">
		</form>
	{% endif %}
	{% for comment in comments %}
	    {% if comment.validate == 'yes' %}
	    	<div class="card">
	            <div class="card-body">
	                <p class="card-text">{{ comment.contents }}</p>
	                <h6 class="card-subtitle mb-2 text-muted">Ecrit par {{ comment.pseudo }}</h6>
            	</div>
        	</div>
	    {% else %}
	    	<div class="card">
	            <div class="card-body">
	                <p class="card-text">*commentaire en attente de validation*</p>
	                <h6 class="card-subtitle mb-2 text-muted">Ecrit par {{ comment.pseudo }}</h6>
            	</div>
        	</div>
	    {% endif %}
	{% endfor %}
        
</div>


	<h2>Pagination</h2>
	<p>
	    {% for page in 1..paging.totalPages %}
	        {% if page == paging.currentPage %}
	            {{page}}
	        {% elseif paging.totalPages == 0 %}
	        {% else %}
	            <a href="Article-{{ post.id }}-Page{{page}}">{{page}}</a>
	        {% endif %}
	    {% endfor %}
	</p>

{% endblock %}