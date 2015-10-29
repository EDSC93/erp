<?php 
	session_start();
	include '.././conexion.php';
	if (isset($_POST['id'])) {
		mysql_query("delete from productos where ID_Producto=".$_POST['id']) or die(mysql_error());
	}
	echo $_POST['id'];
?>