<?php 
include("header.php");
require('php/conexion.php');
$cont = 0;

$titulo = ''; if(isset($_POST['titulo'])){ $titulo = trim($_POST['titulo']); } // definimos $titulo para evitar errores, y guardamos su valor por el ingresado.

if(isset($_POST['enviar'])){
     if($titulo != ""){
	  	$num = $_POST['resp']; // este valor lo vamos a obtener de lo que el usuario ingrese como numero de opciones al crear la encuesta
  		$fecha = date('Y-m-d');

  		$sql= "INSERT INTO `encuestas` (`id` ,`titulo` ,`fecha`) VALUES (NULL ,  '$titulo', '$fecha');"; // si han ingresado si quiera un titulo insertamos esta encuesta en la tabla
		mysqli_query($conexion,$sql);

		$sql = "SELECT MAX(id) as id FROM encuestas"; // ahora obtenemos el id de la ultima fila,
                                                      // la que acabamos de ingresar,
                                                      // esto lo hacemos para poder asociarle las opciones
		$req = 	mysqli_query($conexion,$sql);

		while($result = mysqli_fetch_object($req)){
			$idenc = $result->id;	// con el resultado obtenido hacemos un bucle y definimos los resultados como id_encuesta.
		}

		$sql = "INSERT INTO  `resp` (`id` ,`idenc` ,`texto`,`votos`,`tipo`) VALUES "; // En esta parte estamos armando un query SQL dinamico el cual sera modificado de acuerdo a lo que el usuario ingrese en el formulario.
		for($i=1;$i<=$num;$i++){
			$opcnativa = trim($_POST['opc'.$i]); // obtenemos el nombre de cada opcion indivudalmente.
			if($opcnativa != ""){
				$sql .= "(NULL,'$idenc','$opcnativa','0','3')"; // el id de la opcion ira null para que se ponga automaticamente, en id_encuesta pues ira el id de la encuesta que acabamos de crear, en 'nombre' ira el nombre de la opcion y valor ira 0, puesto que es una nueva opcion sin votos, esto se repetira con todas las opciones que el usuario haya definido.
				$cont++;
			}
			if($i == $num){
				$sql .= ";"; // si es que se llega al final, termina la consulta
			}else{
				$sql .= ", "; // sino se pone una , y se continua.
			}
		}

		if($cont < 2){ // si el usuario no definio ninguna opcion, se elimina la encuesta recien creada, esto es poco probable que suceda ya que la definicion de opciones la haremos con un select, y aqui se seleccionara el valor de 2 por defecto.
			$sql = "DELETE FROM `encuestas` WHERE id = ".$idenc;
			echo "<div class='error'>Tiene que llevar por lo menos 2 opciones.</div>";
		}else{
            header('location: encuesta.php'); // por ultimo si todo salio bien, redireccionamos al index para que el usuario vea su encuesta recien creada.
        }
		mysqli_query($conexion,$sql); // y ejecutamos el query
    }
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Encuestas</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="wrap">
	<h1>Agregar Encuesta</h1>
	<form action="" method="post">

	<div class="fl titulo">
		<label>Titulo:</label>
		<input name="titulo" type="text" value="<?php echo $titulo; ?>" size="26">
	</div>
	<?php
        // esto es simplemente un formulario, pero aqui hacemos una condicion, identificamos si se ha definido un numero de opciones, si es si hacemos un bucle, si es no mostramos el select para definir un numero de opciones, como es obvio por defecto se mostrara el bucle:
	if(isset($_POST['opc'])){
		$num = $_POST['resp']; // guardamos el valor del numero de opciones
		for($i=1;$i<=$num;$i++){ // hacemos el bucle mostrando los campos respectivos.
	?>
	<div class="cf">
		<label>Opcion <?php echo $i; ?>: </label>
		<input name="opc<?php echo $i; ?>" type="text" size="43">
	</div>
	<?php } // aqui termina el bucle ?>
	<div class="cf">
    	<input name="enviar" type="submit" value="Enviar">
        <input name="resp" type="hidden" value="<?php echo $num; // le pasamos el valor de num al proceso del formulario mediante un campo oculto. ?>">
        <input name="cont" type="hidden" value="<?php echo cont; ?>">
    </div>
	<?php }else{ // sino se ha definido nro de opciones: ?>
	<div class="fl">
    	<label>Nº de opciones:</label>
    	<select name="resp">
    		<?php for($i=2;$i<=100;$i++){ // esto es un loop simple, solo para ahorrarnos trabajo, este select tendra de 2 a 20 opciones, si deseas cambiarlo lo puedes hacer aqui. ?>
    		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    		<?php } ?>
		</select>
	</div>



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

    <div class="cf">
      	<input name="opc" type="submit" value="Continuar">
    </div>





      <?php } // Sino se han definido opciones, que en vez de salir el boton de Enviar, salga uno que sea Continuar. ?>
    <a href="encuesta_seleccion.php" class="volver">← Volver</a>
	</form>
	</div>
</body>
</html>
<?php include("footer.php"); ?>