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
		


		<h4>Modificar Producto<h4>
			<br>

			

		<form action="modificar_productophp.php?id=<?php echo  $re=$_GET['id']; ?>" class="form col-md-4" method="post" enctype="multipart/form-data">
		
			<div class="form-group">
				<label for="">Nombre</label>
				<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
				<input type="text" value="<?php echo  $f['Nombre']; ?>" class="form-control"  name="nombre" requerid required
				
			<?php 
				}

		
			if(isset($_SESSION['error'])){
					if($_SESSION['error']==1){
			        	echo "<font color='red'>Nombre repetido, intente otro.</font>";
			      	}
      			}
      		?>	
			
			

			</div>
			
			<div class="form-group">
				<label for="">Descripción</label>
					<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
				<input type="text" rows="10" cols="40"value="<?php echo  $f['Descripcion']; ?>"class="form-control" placeholder="Descripción del producto" name="descripcion" >
				
			<?php 
				}
				?>
				
			</div>
			

			<div class="form-group">
				<label for="">Precio</label>
					<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
				<input type="number" value="<?php echo  $f['Precio']; ?>" class="form-control"  name="precio" >
				
			<?php 
				}
				?>
				
			</div>
			
	

	<div class="form-group">
				<label for="">Categoria</label>
				<select name="categoria" id="" class="form-control">
					<?php 
						$con=mysqli_connect("localhost", "root","","gamersoft");

						if(mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: ".mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT ID_Categoria,Tipo FROM  categoria");
						mysqli_close($con);
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
								
								echo "<option value='".$row["ID_Categoria"]."'>".$row["Tipo"]."</option>";
							}
						}
					?>
				</select>
			</div>

				<div class="form-group">
				<label for="">Subcategoria</label>
				<select name="subcategoria" id="" class="form-control">
					<?php 
						$con=mysqli_connect("localhost", "root","","gamersoft");

						if(mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: ".mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT ID_Subcategoria,Tipo FROM  subcategoria");
						mysqli_close($con);
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
								
								echo "<option value='".$row["ID_Subcategoria"]."'>".$row["Tipo"]."</option>";
							}
						}
					?>
				</select>
			</div>

			<div>
				<label for="">Imagen</label>
				<br>
				<a href="modificar_imagen.php?id=<?php echo  $re=$_GET['id']; ?>">Modificar</a>
				</div>

			<div class="form-group">
				<label for="">Peso</label>
				
				<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
				<input type="number" value="<?php echo  $f['Peso']; ?>" class="form-control" placeholder="Gramos" name="peso" >
				
			<?php 
				}
				?>

			</div>

			<div class="form-group">
				<label for="">Altura</label>
					<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
				<input type="number" value="<?php echo  $f['Altura']; ?>"class="form-control" placeholder="Centimetros" name="altura" >
				
			<?php 
				}
				?>
				
			</div>
			<div class="form-group">
				<label for="">Anchura</label>
				<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
				<input type="number" value="<?php echo  $f['Anchura']; ?>" class="form-control" placeholder="Centimetros" name="anchura" >
				
			<?php 
				}
				?>


			</div>
			<div class="form-group">
				<label for="">Profundidad</label>
			<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
					<input type="number" value="<?php echo  $f['Profundidad']; ?>" class="form-control" placeholder="Centimetros" name="profundidad" >
			
			<?php 
				}
				?>

			</div>
			<div class="form-group">
				<label for="">Venta Máxima</label>
				<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
					<input type="number" value="<?php echo  $f['Venta_Maxima']; ?>" class="form-control" placeholder="Numero de venta Máxima" name="ventamaxima" >
			
			<?php 
				}
				?>
			</div>

			<div class="form-group">
				<label for="">Venta Minima</label>
				<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
				<input type="number" value="<?php echo  $f['Venta_Minima']; ?>"  class="form-control" placeholder="Número de venta Minima" name="ventaminima" >
				
			<?php 
				}
				?>
			</div>

			<div class="form-group">
				<label for="">IVA</label>
					<?php 
						require_once  '../db_connect.php'; //obtener los datos para la coneccion.
						
						$result=mysql_query("SELECT * FROM productos WHERE ID_Producto=$re")or die(mysql_error());
						
						while ($f=mysql_fetch_array($result)) 
				
				{
					
			?>
			<input type="number" value="<?php echo  $f['Iva']; ?>" class="form-control" placeholder="Impuesto" name="iva" >
					
			<?php 
				}
				?>
			</div>

			<div class="form-group">
				<label for="">Visibilidad</label>
				<select name="visibilidad" id="" class="form-control">
					<option value='1'>True</option>";
					<option value='0'>False</option>";
						
				</select>
			</div>
			
			

		
			
			<div class="form-group">
				<button type="submit" name="submit"class="btn btn-primary">Modificar</button>
			</div>
		</form>
		<form method="POST" action="Administrador.php">
			
			<input type="submit" class="btn btn-primary" value="Regresar" />

 		</form>
	</div>
	
	<?php 
		if(isset($_SESSION['error'])){
        $_SESSION['error']=0;
      }
	?>
</body>
</html>
		
	