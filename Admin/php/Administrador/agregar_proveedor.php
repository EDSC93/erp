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
	<title>Agregar Proveedor</title>
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
		<h4>Agrege el proveedor.<h4>
			<br>
		<form action="agregar_proveedorphp.php" class="form col-md-4" method="post" enctype="multipart/form-data">
		
			<div class="form-group">
				<label for="">Empresa</label>
				<input type="text" class="form-control" placeholder="Nombre de la empresa" name="empresa" requerid required>
			<?php if(isset($_SESSION['error'])){
					if($_SESSION['error']==1){
			        	echo "<font color='red'>Nombre repetido, intente otro.</font>";
			      	}
      			}
      		?>
			</div>
			
			<div class="form-group">
				<label for="">Dirección</label>
				<input type="text" rows="10" cols="40"class="form-control" placeholder="Dirección" name="direccion" >
			</div>
			<div class="form-group">
				<label for="">Telefono</label>
				<input type="number" class="form-control" placeholder="Lada y número" name="telefono" >
			</div>
			<div class="form-group">
				<label for="">Contacto</label>
				<input type="text" rows="10" cols="40"class="form-control" placeholder="Nombre del contacto" name="contacto" >
			</div>
			<div class="form-group">
			<label for="imagen">Imagen</label>
			<input id="imagen" type="file"  name="imagen" >
				</div>


			
			

		
			
			<div class="form-group">
				<button type="submit" name="submit"class="btn btn-primary">Agregar</button>
			</div>
		</form>
	</div>
	
	<?php 
		if(isset($_SESSION['error'])){
        $_SESSION['error']=0;
      }
	?>
</body>
</html>
		
	