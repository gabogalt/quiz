<h2>Exámen de conocimientos en PHP</h2>
<p> Es un test de elecciones múltiples </p>
<ul>
	<li><strong>Número de preguntas:</strong> 
		<?php echo $count_question; ?>
	</li>
	<li><strong>Tipo:</strong> Elecciones múltiples</li>
	<li><strong>Tiempo estimado:</strong> 
     <?php echo $count_question * .5 ?> por pregunta
	</li>
</ul>
<a href=" <?php echo site_url('quiz/question/1'); ?>" class=" btn btn-outline-primary" > Empezar</a>
