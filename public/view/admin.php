{% extends 'template.php' %}

{% block page_title %}
<title>Administration</title>
{% endblock %}

{% block content %}

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="true">Utilisateurs</a>
    <a class="nav-item nav-link" id="nav-post-tab" data-toggle="tab" href="#nav-post" role="tab" aria-controls="nav-post" aria-selected="false">Articles</a>
    <a class="nav-item nav-link" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="false">Commentaires</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
        <ul>
            {% for pendingUser in pendingUsers %}
                <li>{{pendingUser.pseudo}} / {{pendingUser.email}}</li>
                <form method="post" action="Administration">
                    <button type="submit" name="idValidateUser" value="{{pendingUser.id}}">Valider</button>
                    <button type="submit" name="idDeleteUser" value="{{pendingUser.id}}">Supprimer</button>
                </form>
            {% endfor %}
        </ul>
    </div>
    <div class="tab-pane fade" id="nav-post" role="tabpanel" aria-labelledby="nav-post-tab">
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
    </div>
    <div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
        <ul>
            {% for invalideComment in invalideComments %}
                <li>{{invalideComment.contents}}</li>
                <form method="post" action="Administration">
                    <button type="submit" name="idValidateComment" value="{{invalideComment.id}}">Valider</button>
                    <button type="submit" name="idDeleteComment" value="{{invalideComment.id}}">Supprimer</button>
                </form>
            {% endfor %}
        </ul>
    </div>
</div>


{% endblock %}
