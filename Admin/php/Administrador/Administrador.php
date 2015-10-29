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
	$query1=mysql_query("SELECT  Nombre, Fecha_registro FROM usuario ORDER BY Fecha_registro DESC LIMIT 5");
	$query2=mysql_query("SELECT  Fecha_inicio FROM promociones ORDER BY Fecha_inicio DESC LIMIT 3")
?>

<!DOCTYPE html>
<html lang="ess">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Producto | GamerSoft </title>
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../css/prettyPhoto.css" rel="stylesheet">
    <link href="../../../css/price-range.css" rel="stylesheet">
    <link href="../../../css/animate.css" rel="stylesheet">
	<link href="../../../css/main.css" rel="stylesheet">
	<link href="../../../css/responsive.css" rel="stylesheet">
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
	
</head><!--/head-->

<body>
<header id="header"><!--header-->
		
		
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
								<li><a href="categoria.php" class="active">Categoría</a></li>
								<li><a href="compraAdmin" class="active">Compra</a></li>	
								<button type="button" class="btn btn-default get"><a href="agregar_producto.php">Agregar producto</a></button>								
							</ul>
						</div>
					</div>					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	
		<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				
				
	<section>	
		<table id="table_id" class="display">
		    <thead>
		        <tr>
		            <th>Imagen</th>
		            <th>Nombre</th>
		            <th>Precio</th>
		            <th>Visibilidad</th>
		            <th>Accion</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php 
					$re=mysql_query("select * from productos");
					while ($f=mysql_fetch_array($re)) {
				?>

		        <tr>
		            <td><img src="./../../..//productos/<?php echo  $f['Url_Imagen']; ?>" width="100px" heigth="100px" /></td>
		            <td><?php echo  $f['Nombre']; ?></td>
		            <td><?php echo  $f['Precio']; ?></td>
		            <td><?php echo  $f['Visibilidad']; ?></td>
		            <td>
		            	<a href="modificar_producto.php?id=<?php echo  $f['ID_Producto']; ?>">Modificar</a>
						<a href="#" class="eliminar" data-id="<?php echo $f['ID_Producto']; ?>">Eliminar</a>
		            </td>
		        </tr>

		        <?php 
					}
				?>
		    </tbody>
		</table>
	</section>
				
				
				
				</div>
			</div>
		</div>

</body>

</html>