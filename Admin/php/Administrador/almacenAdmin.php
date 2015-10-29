<?php 
	include './../../../conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Almacen</title>
	<link href="./../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="./../../../css/font-awesome.min.css" rel="stylesheet">
    <link href="./../../../css/prettyPhoto.css" rel="stylesheet">
    <link href="./../../../css/price-range.css" rel="stylesheet">
    <link href="./../../../css/animate.css" rel="stylesheet">
	<link href="./../../../css/main.css" rel="stylesheet">
	<link href="./../../../css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./../../../css/estilos.css">
	<!--Nuevo -->
	<link rel="stylesheet" type="text/css" href="./../../../css/jquery.dataTables.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" charset="utf8" src="./../../../js/jquery.dataTables.js"></script>

	<script type="text/javascript"  src="./../../../js/scriptsAdmin.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
    		$('table.display').DataTable();
		} );
	</script>
	<!--Nuevo -->
</head>
<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="../../../images/home/logo.png" alt="" /></a>
						</div>						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="../logout.php"><i class="fa fa-lock"></i> cerrar sesion</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Inicio</a></li>
								<li><a href="genero.php" class="active">Genero</a></li>
								<li><a href="categoria.php" class="active">Categoría</a></li>
								<li><a href="proveedoresAdmin.php" class="active">Proveedor</a></li>
								<li><a href="administrador.php" class="active">Producto</a></li>
								<li><a href="compraAdmin" class="active">Compra</a></li>	
								</ul>
						</div>
					</div>					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<center>
		<a href="agregar_movimiento.php">Recepción de producto</a>
	</center>

	<section>	
		<table id="table_id" class="display">
		    <thead>
		        <tr>
		            <th>Producto</th>
		            <th>Sección</th>
		            <th>Existencia</th>
		            <th>Proveedor</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php 
					$re=mysql_query("select * from almacen");
					while ($f=mysql_fetch_array($re)) {
				?>

		        <tr>
		            <td>
		            	<?php
		            		$req=mysql_query("select Nombre from productos where ID_Producto=".$f['ID_Producto']);
		            		$fq=mysql_fetch_array($req);
		            		echo $fq['Nombre'];
		            		unset($req);
		            	?>
		            </td>
		            <td><?php echo  $f['Seccion']; ?></td>
		            <td><?php echo  $f['Existencia']; ?></td>
		            <td>
		            	<?php
		            		$req=mysql_query("select Empresa from proveedores where ID_Proveedores=".$f['ID_Proveedor']);
		            		$fq=mysql_fetch_array($req);
		            		echo $fq['Empresa'];
		            		unset($req);
		            	?>
		            </td>
		        </tr>

		        <?php 
					}
					unset($re);
				?>
		    </tbody>

		    
		</table>
	</section>

	<section>	
		<table id="table_id" class="display">
		    <thead>
		        <tr>
		            <th>Producto</th>
		            <th>Movimiento</th>
		            <th>Cantidad</th>
		            <th>Usuario</th>
		            <th>Fecha</th>
		            <th>Hora</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php 
					$re=mysql_query("select * from movimiento_almacen");
					while ($f=mysql_fetch_array($re)) {
				?>

		        <tr>
		            <td>
		            	<?php
		            		$req=mysql_query("select Nombre from productos where ID_Producto=".$f['ID_Producto']);
		            		$fq=mysql_fetch_array($req);
		            		echo $fq['Nombre'];
		            		unset($req);
		            	?>
		            </td>
		            <td><?php echo  $f['Movimiento']; ?></td>
		            <td><?php echo  $f['Cantidad']; ?></td>
		            <td>
		            	<?php
		            		$req=mysql_query("select Nombre, Apellido_Pat, Apellido_Mat from usuario where ID_Usuario=".$f['ID_Usuario']);
		            		$fq=mysql_fetch_array($req);
		            		echo "".$fq['Nombre']." ".$fq['Apellido_Pat']." ".$fq['Apellido_Mat'];
		            		unset($req);
		            	?>
		            </td>
		            <td><?php echo  $f['Fecha']; ?></td>
		            <td><?php echo  $f['Hora']; ?></td>
		        </tr>

		        <?php 
					}
					unset($re);
				?>
		    </tbody>
		</table>
	</section>
</body>
</html>