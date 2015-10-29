<?php
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
<!--
<ul class="nav navbar-nav navbar-right nav-tabs">
			  <li role="presentation"><a href="../index.html">Inicio
			  	<span class="ico glyphicon glyphicon-home"></span></a></li>
			  <li role="presentation"><a href="../index.html#services">¿Qué es AlertDeal?
			  	<span class="ico glyphicon glyphicon-question-sign"></span></a></li>
			  <li role="presentation"><a href="../acceso.php">Acceso a clientes
			  	<span class="ico glyphicon glyphicon-arrow-right"></span></a></li>
			  <li role="presentation"><a href="vistaencargado.php">Registrar empresa
			  	<span class="ico glyphicon glyphicon-warning-sign"></span></a></li>
			</ul>
		</div>
-->

	</nav>
		<div class="container" style="padding:80px">
	<!-- -->
		<?php
	
		$re=$_GET['id'];
		
			
		?>
		


		<h4>Favor de modificar Imagen<h4>
			<br>

			<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) {
			?>
				<center><br/><br/><br/>
				<h4>Nombre de la imagen:<h4>
				<form action="proceso_imagen.php?id=<?php echo  $re=$_GET['id']; ?>" method="POST" enctype="multipart/form-data">
					<input type="text" REQUIRED name="nombre" placeholder="Nombre..." value="<?php echo $f['Url_Imagen']; ?>"/><br/><br/>
					<img height="300px" src="../../../productos/<?php echo $f['Url_Imagen']; ?>" /> <br/><br/>
					<input type="file" REQUIRED name="Imagen"/><br><br/>		
					<input type="submit" class="btn btn-primary" value="Cambiar">
			</center>
						
					
			<?php 
				}
			?>
			
				
</body>
</html>
		
	