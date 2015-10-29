<?php

	include '../../../conexion.php';
	session_start();
	if(!isset($_SESSION['Usuario'], $_SESSION['Password'])){
		header("location:../../index.php?error=1");
	}
	if($_SESSION['ID_Permisos']!=5)
		{
			header("location:../../index.php?error=2");
		}
	require_once '../db_connect.php'; //obtener los datos para la coneccion.
	$db = new DB_CONNECT(); //crear la coneccion	
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina</title>
</head>
<body>
	<?php
		$nombre=$_POST['nombre'];
		mysql_query("INSERT INTO categoria (Tipo) Values ('".$nombre."')") or die(mysql_error());	
		
		header("location: categoria.php");
	?>
</body>
</html>