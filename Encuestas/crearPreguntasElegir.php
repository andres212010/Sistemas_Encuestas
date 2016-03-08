<?php 
	include("header.php");
	//Capturamos los datos que vienen por post
	//que vienen de crearEncuesta
	$titulo = $_POST["titulo"];
	$preguntas = $_POST["preguntas"];
	?>
	<section id="form">
		<form action="php/insertarPreguntasElegir.php" class="contact_form" method="post">
			<h3><?php echo $titulo; ?></h3>
			<table>
				<?php 
				//ciclo for que recorre la contidad de preguntas ingresadas
				for ($i=1; $i <= $preguntas; $i++){
				 ?>
				<tr>
					<td>Preguntas <?php echo $i; ?>&nbsp;</td>
					<td><input name ="p<?php echo $i; ?>"type="text" size ="50" maxlenght="50"></td>
				</tr>
				<?php } ?>
			</table><br>
			<input class="submit" type="submit" value="Insertar"></input>
			<input name="titulo" type="hidden" value="<?php echo $titulo; ?>">	
			<input name="preguntas" type="hidden" value="<?php echo $preguntas; ?>">

		</form>
	</section>
	<style>
		#center{
			margin: -10px;
			padding: 0px 0px 20px;
		}
	</style>
	<center id="center">
		<a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atr&aacute;s</a>

	</center>
	<?php 
		include ("footer.php");
		?>