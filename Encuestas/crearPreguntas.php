<?php 
	include("header.php");
	require("php/conexion.php");
	//Capturamos los datos que vienen por post
	//que vienen de crearEncuesta
	$titulo = $_POST["titulo"];
	$preguntas = $_POST["preguntas"];
	include ("footer.php");

?>
<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	
	

	<section id="form">
		<form name="form" action="php/insertarPreguntas.php" class="contact_form" method="post">
			<h3><?php echo $titulo; ?></h3>
			<table>
				<?php 
				//ciclo for que recorre la contidad de preguntas ingresadas
				for ($i=1; $i <= $preguntas; $i++){
				 ?>
		
				<tr>
					<td>Preguntas <?php echo $i; ?>&nbsp;
					
					</td>
					<td><input name ="p<?php echo $i; ?>"type="text" size ="50" maxlenght="50">


					<td>
						<div>

						<select name="categoria" id="" onchange="from(document.form.categoria.value,'midiv','maquinas.php')">
						<option value="0">Seleccione</option>
						<?php 
						$query=mysqli_query($conexion,"SELECT * FROM selec");
						  // 
							//$query=("SELECT * FROM seleccion");
							//$res=mysql_query($conexion,$query);
						//$query=mysqli_query($conexion,"SELECT * FROM seleccion");
						//$rec=mysqli_query($conexion,$sql);
						while($row = mysqli_fetch_array($query)){

						
						?>
						<!--{
							echo "<option value>";
							echo $row['tipo'];
							echo "</option>";
						}-->
				
						<option value="<?php echo $row['id'];?>"> <?php echo ($row['tipo']);?></option>
					
					<?php } ?>
				</select>
				<!--<input type="submit" name="enviar" value="Enviar" /><br /><br />-->
			
				</div>

				<div id="midiv">
				</div>


			</td>

				</tr>
				<?php } ?>
			<!--</table><br>-->
			<input class="submit" type="submit" value="Terminar encuesta"></input>
			<input name="titulo" type="hidden" value="<?php echo $titulo; ?>">	
			<input name="preguntas" type="hidden" value="<?php echo $preguntas; ?>">



		</form>
	</section>

<!--Margen de casillas texto-->

	<style>
		#center{
			margin: -10px;
			padding: 0px 0px 20px;
		}
	</style>



	<!--<center id="center">
		<a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atrás</a>-->

	</center>
	<?php 
		//include ("footer.php");
		?>