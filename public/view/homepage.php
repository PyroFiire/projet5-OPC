{% extends 'template.php' %}

{% block page_title %}
<title>le BLOG de Christophe Guinot</title>
{% endblock %}

{% block content %}
  <div id="presentation" class="container-fluid">
    <img id="avatar" src="public/pictures/avatar.svg">
    <h1>Christophe Guinot</h1>
    <p>Le développeur qu'il vous faut !</p>
    <a href="pdf/cv.pdf">Voir le CV !</a>
  </div>
<!-- FORM -->
<form method="post" action="#">
  <div class="container">
    <h2>Formulaire de contact</h2>
    <div id="name" class="row">
      <label class="col-3" for="firstname">Prénom/Pseudo :</label>
      <input class="col-3" type="text" name="firstname" id="firstname" value="{{userDatas.pseudo}}"/>
      <label class="col-3" for="lastname">Nom :</label>
      <input class="col-3" type="text" name="lastname" id="lastname"/>
      <label class="col-3" for="email">Email :</label>
      <input class="col-3" type="email" name="email" id="email" value="{{userDatas.email}}"/>
      <div class="offset-6"></div>
      <label class="col-3" for="message">Votre message :</label>
      <textarea class="col-9" name="message" id="message" rows="3"></textarea>
      <input class="col-2 offset-5" type="submit" value="Envoyer">
    </div>
</form>
{% endblock %}