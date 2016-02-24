<?php
include("header.php");
require('php/conexion.php');
        $id = $_GET['id'];
	if(!isset($_GET['id'])){
		header('location: encuesta_seleccion.php');
	}

	if(isset($_POST['votarseleccion']))
	{

		if(isset($_POST['votos'])){
			$resp = $_POST['votos'];
			$mod = mysqli_query($conexion,"SELECT * FROM resp WHERE id = ".$resp);
			while($result = mysqli_fetch_object($mod)){
				$votos = $result->votos + 1; // obtenemos el voto de 'votos' y le añadimos 1 unidad
				mysqli_query($conexion,"UPDATE resp SET votos = '".$votos."' WHERE id = ".$resp); // luego ejecutamos el query SQL
			}
			header('location: resultado.php?id='.$id); // Por ultimo lo redireccionamos a la encuestas mostrando los resultados.
		}
	}
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sistema de encuestas</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="wrap">

<form action="" method="post">
<?php
$aux = 0;
$sql = "SELECT a.titulo as titulo, a.fecha as fecha, b.id as id, b.texto as texto, b.votos as votos FROM encuestas a INNER JOIN resp b ON a.id = b.idenc WHERE a.id = ".$id;
$req = mysqli_query($conexion,$sql);

while($result = mysqli_fetch_object($req)){

	if($aux == 0){
		echo '<h1>'.$result->titulo.'</h1>';

		echo '<ul>';
		$aux = 1;
	}

	echo '<li><input name="votos" type="radio" value="'.$result->id.'"><span>'.$result->texto.'</span></li>';

}
	echo '</ul>';	

	if(!isset($_POST['votos'])){
		echo "<div class='error'>Selecciona una opcion.</div>";
	}

	echo '<input name="votarseleccion" type="submit" value="Votar">';
	echo '<a href="resultado.php?id='.$id.'" class="resultado">Ver Resultados</a>';
	echo '<a href="encuesta_seleccion.php" class="volver">&larr; Volver</a>';

?>

</form>
</div>

</body>
</html>

<?php include("footer.php"); ?>