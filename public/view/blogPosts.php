{% extends 'template.php' %}

{% block page_title %}
<title>Les articles</title>
{% endblock %}

{% block content %}
<p>La liste des articles (blog posts)</p>

<ul>
    {% for post in posts %}
    <li>
        {{ post.id }}<br>
    	{{ post.title }}<br>
		{{ post.last_date_change }}<br>
		{{ post.standfirst }}<br>
		{{ post.ref_id_users }}<br>
	</li>
    {% endfor %}
</ul>



{% endblock %}