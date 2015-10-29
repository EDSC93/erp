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
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Categoria | GamerSoft </title>
    <link href="./../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="./../../../css/font-awesome.min.css" rel="stylesheet">
    <link href="./../../../css/prettyPhoto.css" rel="stylesheet">
    <link href="./../../../css/price-range.css" rel="stylesheet">
    <link href="./../../../css/animate.css" rel="stylesheet">
	<link href="./../../../css/main.css" rel="stylesheet">
	<link href="./../../../css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="js/bootstrap.min.js"></script>
	
	
	
	
	<link rel="stylesheet" type="text/css" href="./../../../css/jquery.dataTables.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>	
	<script type="text/javascript" charset="utf8" src="./../../../js/jquery.dataTables.js"></script>

	<script type="text/javascript"  src="./../../..//js/scriptsAdmin.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
    		$('#table_id').DataTable();
		} );
	</script>
	<script type="text/javascript">
		$(document).ready( function () {
    		$('#table_idd').DataTable();
		} );
	</script>
	
</head><!--/head-->

<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@gamersoft.com</a></li>
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
								<li><a href="almacenAdmin.php" class="active">Almacen</a></li>
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

	<section id="cart_items">
		<div class="container">			
			<div class="table-responsive cart_info">
				<section>
						<table id="table_idd" class="display">
							<thead>
								<tr>
									<th>Categoria</td>							
								</tr>
							</thead>
							<tbody >
										<?php 
											require_once  '../db_connect.php'; //obtener los datos para la coneccion.									
											$result=mysql_query("SELECT Tipo FROM categoria")or die(mysql_error());									
											while ($f=mysql_fetch_array($result)) 
											{											
										?>	
								<tr>
									<td>							
										<h4> <?php echo  $f['Tipo']; ?>  </h4>								
										<?php 
										}
										if(isset($_SESSION['error']))
											{
												if($_SESSION['error']==1)
												{
													echo "<font color='red'>Error favor de intentarlo de nuevo.</font>";
												}
											}
										?>	
									</td>						
								</tr>				
							</tbody>
						</table>
					</section>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
		<section id="do_action" >
			<div class="container pull-right">			
				<div class="row">				
					<div class="col-sm-6" >
						<div class="total_area">
							<form name="agregarSubcategoria" method="post" action="agregarcategoria.php">						
								<ul>
									<input type="text" value="" name="nombre" placeholder="Nombre de la Categoria" href="">
								</ul>								
									<input value="Agregar Categoria" class="btn btn-default update" href="" type="submit"/>									
							</form>							
						</div>
					</div>
				</div>
			</div>
		</section><!--/#do_action-->
	
	
	
	
		<section id="cart_items">
		<div class="container">		
			<div class="row">
				<div class="col-sm-12">
					<section>
						<table id="table_id" class="display">
							<thead>
								<tr>
									<th>Subcategoria</td>							
								</tr>
							</thead>
							<tbody >
										<?php 
											require_once  '../db_connect.php'; //obtener los datos para la coneccion.									
											$result=mysql_query("SELECT Tipo FROM subcategoria")or die(mysql_error());									
											while ($f=mysql_fetch_array($result)) 
											{											
										?>	
								<tr>
									<td>							
										<h4> <?php echo  $f['Tipo']; ?>  </h4>								
										<?php 
										}
										if(isset($_SESSION['error']))
											{
												if($_SESSION['error']==1)
												{
													echo "<font color='red'>Error favor de intentarlo de nuevo.</font>";
												}
											}
										?>	
									</td>						
								</tr>				
							</tbody>
						</table>
					</section>
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
		<section id="do_action" >
			<div class="container pull-right">			
				<div class="row">				
					<div class="col-sm-6" >
						<div class="total_area">
							<form name="agregarSubcategoria" method="post" action="agregarsubcategoria.php">						
								<ul>
									<input type="text" value="" name="nombre" placeholder="Nombre de la subcategoria" href="">
								</ul>								
									<input value="Agregar Subcategoria" class="btn btn-default update" href="" type="submit"/>									
							</form>
						</div>
					</div>
				</div>
			</div>
		</section><!--/#do_action-->
	

</body>
</html>