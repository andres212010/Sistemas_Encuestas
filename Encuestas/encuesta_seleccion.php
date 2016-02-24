
<?php
require('php/conexion.php');
include("header.php");

$sql = "SELECT * FROM encuestas ORDER BY id DESC";
$req = mysqli_query($conexion,$sql);
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
    	<h1>Encuestas</h1>
    	<ul class="votacion index">
		<?php
			while($result = mysqli_fetch_object($req)){
				echo '<li><a href="encuesta.php?id='.$result->id.'">'.$result->titulo.'</a></li>';
			}
		?>
		</ul>
    	<a href="agregar.php">+ Agregar nueva encuesta</a>
	</div>
</body>
</html>
<?php include("footer.php"); ?>