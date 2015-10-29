<?php 
	include './../../../conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Compra|GamerSoft</title>
	<link href="./../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="./../../../css/font-awesome.min.css" rel="stylesheet">
    <link href="./../../../css/prettyPhoto.css" rel="stylesheet">
    <link href="./../../../css/price-range.css" rel="stylesheet">
    <link href="./../../../css/animate.css" rel="stylesheet">
	<link href="./../../../css/main.css" rel="stylesheet">
	<link href="./../../../css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./../../../css/estilos.css">

	<link rel="stylesheet" type="text/css" href="./../../../css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" charset="utf8" src="./../../../js/jquery.dataTables.js"></script>

	<script type="text/javascript"  src="./../../../js/scriptsAdmin.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
    		$('table.display').DataTable(
    			{
        			"scrollX": true
    			} 
    		);
		} );
	</script>
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
								<li><a href="almacenAdmin" class="active">Almacen</a></li>	
								</ul>
						</div>
					</div>					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<center>
		<a href="agregar_compra.php">Agregar Compra</a>
	</center>
	<div class="container" style="margin-top: 60px;">
		<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Productos</h4>
					</div>
					<div class="modal-body">
						<section>	
							<table id="table1" class="display">
							    <thead>
							        <tr>
							            <th>Producto</th>
							            <th>Precio</th>
							            <th>Cantidad</th>
							        </tr>
							    </thead>
							    <tbody>
							    	
							    </tbody>
							</table>
						</section>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section>	
		<table id="table_id" class="display">
		    <thead>
		        <tr>
		            <th>Numero de Compra</th>
		            <th>Proveedor</th>
		            <th>Total</th>
		            <th>Fecha de Orden</th>
		            <th>Fecha de Entrega</th>
		            <th>Aprobado</th>
		            <th>Accion</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php 
					$re=mysql_query("select * from compra");
					while ($f=mysql_fetch_array($re)) {
				?>

		        <tr>
		        	<td><?php echo  $f['ID_Compra']; ?></td>
		            <td>
		            	<?php
		            		$req=mysql_query("select Empresa from proveedores where ID_Proveedores=".$f['ID_Proveedor']);
		            		$fq=mysql_fetch_array($req);
		            		echo $fq['Empresa'];
		            		unset($req);
		            	?>
		            </td>
		            <td><?php echo  $f['Costo_Total']; ?></td>
		            <td><?php echo  $f['Fecha_Orden']; ?></td>
		            <td><?php echo  $f['Fecha_Entrega']; ?></td>
		            <td><?php echo  $f['Aprobado']; ?></td>
		            <td>
		            	<a href="#" class="ver_compra" data-id="<?php echo $f['ID_Compra']; ?>" data-toggle="modal" data-target="#miventana">Ver</a>
		            </td>
		        </tr>

		        <?php 
					}
					unset($re);
				?>
		    </tbody>


		</table>
	</section>
	<script type="text/javascript" src="./../../../js/bootstrap.min.js"></script>
</body>
</html>