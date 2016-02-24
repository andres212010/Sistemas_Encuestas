<?php 
	
	//Autentica la sesion
	include("php/sesion.php");
	include("header.php");

 ?>

 	<section id="form">
 		<form action="crearPreguntas.php" class="contact_form" method="post">
	<ul>
		<li>
				<h2>Crear encuestas</h2>
		</li>
		<li>
			<label for="titulo">Encuesta:</label>
			<input type="text" name="titulo" placeholder="Encuesta" required/>
		</li>
		<li>
			<label for="preguntas">Preguntas:</label>
			<input type="number" name="preguntas" placeholder="Preguntas" min="1" max="1" required/>
		</li>
		<li>
			<input type="submit" class="submit" value="Crear"/>
		</li>	
	</ul>	
			<li><a href="verEncuesta.php" id="enlaces">VER RESULTADOS/RESPONDER ENCUESTAS</a></li>
 		</form>
 	</section>

<?php 
	include("footer.php");
 ?>
