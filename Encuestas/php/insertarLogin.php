<?php 
	require("conexion.php");
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"];
	$pass = $_POST["password"];
	$pass2 = $_POST["password2"];

		if($pass==$pass2){
			$consulta = "INSERT INTO login (nombre, email, telefono, pass) VALUES ('$nombre','$email','$telefono','$pass')";
				echo "USUARIO REGISTRADO CON EXITO";
				?>
				<ul><a href="../login.php" id="enlaces">&laquo;Iniciar sesion</a></ul>
				<?php
		mysqli_query($conexion,$consulta);
		}else{
			echo "LAS CONTRASEÑAS NO COINCIDEN";
		}


	
//header("Location: ../index.php");

 ?>

 	<ul><a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atrás</a></ul>