<?php                       
	session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
	<script src="../../js/bootstrap.min.js"></script>
	<title>CRM</title>
	<style type="text/css">
.row-centered
	{
		border:2px solid #FE1717;
		border-radius: 10px;
		margin-top: 10px;
		background: #92FF8C;

	}
	.form-group
	{
		margin-top: 30px;
	}
	
	.nav
	{
		background: #ffffff;
	}
	.nav2
	{
		background: #F5A9E1;
	}
	.ico
	{
		
		color:red;
	}
		li:active{
			border: 2px solid #2196F3;
		}
	</style>
</head>
<body onload="getPosition()">
	<nav class="nav navbar-fixed-top">
		<div class="container">
			<div  class="navbar-header">
 			<a href="http://alertdeal.edsc93.com/" ><img style ="width:230px; height:70px "  src="../../img/logo.png"  href="home.php" class="img-responsive" alt="Responsive image">	</a>
		</div>

	</nav>
		<div class="container" style="padding:80px">
	<!-- -->
		<?php
	
		$re=$_GET['id'];
		
			echo "$re";
		?>
		


		<h4>Modificar Imagen<h4>
			<br>

			<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						$db = new DB_CONNECT(); 
					
						$Imagen=addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
						$nombre=$_FILES['Imagen']['name'];
						$ruta = "../../../productos/" . $_FILES['Imagen']['name'];
						$resultado = @move_uploaded_file($_FILES["Imagen"]["tmp_name"], $ruta);

						$result=mysql_query("UPDATE productos SET Url_Imagen='$nombre' WHERE ID_Producto=$re")or die(mysql_error());
						
						
			
			if($result)
			{
				header("location: modificar_imagen.php?id=$re");
			}
			else
			{
				echo "No se modificó";
			}
				
		
			?>
				
</body>
</html>
		
	