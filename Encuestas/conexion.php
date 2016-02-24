<?php 
$host ="localhost";
$user = "root";
$pass = "";
$db = "system_encuestas";
$conexion = mysql_connect($host, $user, $pass) OR die("No hay conexion a la base de datos");
mysql_select_db($db, $conexion) or die("No existe la base de datos");
 ?>
