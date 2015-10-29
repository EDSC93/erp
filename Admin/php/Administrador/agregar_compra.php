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
	<title>Agregar Compra</title>
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
		<h4>Agrege el compra.<h4>
			<br>
		<form action="agregar_compraphp.php" class="form col-md-4" method="post" enctype="multipart/form-data">
		
			<div class="form-group">
				<label for="">Empresa</label>
				<select name="empresa" id="" class="form-control">
					<?php 
						$con=mysqli_connect("localhost", "root","","gamersoft");

						if(mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: ".mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT ID_Proveedores,Empresa FROM  proveedores");
						mysqli_close($con);
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
								
								echo "<option value='".$row["ID_Proveedores"]."'>".$row["Empresa"]."</option>";
							}
						}
					?>
				</select>
			</div>
			
			
			<div class="form-group">
				<label for="">Costo Total</label>
				<input type="number" class="form-control" placeholder="$" name="costo" >
			</div>
			<div class="form-group">
				<label for="">Fecha de Orden</label>
				<input type="date" rows="10" cols="40"class="form-control" placeholder="Nombre del contacto" name="fecha_orden" >
			</div>
			<div class="form-group">
				<label for="">Fecha de Entrega</label>
				<input type="date" rows="10" cols="40"class="form-control" placeholder="Nombre del contacto" name="fecha_entrega" >
			</div>

			

			<div class="form-group">
				<label for="">Aprobado</label>
				<select name="aprobado" id="" class="form-control">
					<option value='1'>True</option>";
					<option value='0'>False</option>";
						
				</select>
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
		
	