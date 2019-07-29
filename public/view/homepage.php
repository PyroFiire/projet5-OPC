{% extends 'template.php' %}

{% block page_title %}
<title>le BLOG de Christophe Guinot</title>
{% endblock %}

{% block content %}
  <div id="presentation" class="container-fluid">
    <img id="avatar" src="public/pictures/avatar.svg">
    <h1>Christophe Guinot</h1>
    <h2 id="slogan">Le développeur qu'il vous faut !</h2>
    <a class="h3" id="cv" href="pdf/cv.pdf">Voir le CV !</a>
  </div>
<!-- FORM -->
<form method="post" action="#">
    <div class="container">
        <h2>Contactez-moi !</h2>
        <div class="form-group">
            <label for="firstname">Prénom/Pseudo :</label>
            <input class="form-control" type="text" name="firstname" id="firstname" value="{{userDatas.pseudo}}"/>
        </div>
        <div class="form-group">
            <label for="lastname">Nom :</label>
            <input class="form-control" type="text" name="lastname" id="lastname"/>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input class="form-control" type="email" name="email" id="email" value="{{userDatas.email}}"/>
        </div>
        <div class="form-group">
            <label for="message">Votre message :</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Envoyer">
    </div>
</form>
{% endblock %}