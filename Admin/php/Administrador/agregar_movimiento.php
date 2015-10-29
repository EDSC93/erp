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

?>

<!DOCTYPE html>
<html lang="ess">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Movimiento | GamerSoft</title>
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

	<!--
		<div class="header-bottom"><!--header-bottom
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
								<button type="button" class="btn btn-default get"><a href="agregar_compra.php">Agregar Compra </a></button>								
							</ul>
						</div>
					</div>					
				</div>
			</div>
		</div><!--/header-bottom-->
		
	<div class="container" style="padding:30px">
		<h4>Registrar movimiento de recepción de producto.<h4>
			<br>
		
		<form action="agregar_movimientophp.php" class="form col-md-4" method="post" enctype="multipart/form-data">
		
			<div class="form-group">
				<label for="">Producto</label>
				<select name="producto" id="" class="form-control">
					<?php 
						$con=mysqli_connect("localhost", "root","","gamersoft");

						if(mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: ".mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT ID_Producto,Nombre FROM  productos");
						mysqli_close($con);
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
								
								echo "<option value='".$row["ID_Producto"]."'>".$row["Nombre"]."</option>";
							}
						}
					
					?>
					
				</select>
			
			</div>
			
			
			
			
			<div class="form-group">
				<label for="">Cantidad</label>
				<input type="number" class="form-control" placeholder="" name="cantidad" >
			</div>

				

			<div class="form-group">
				<label for="">Fecha de recepción</label>
				<input type="date" rows="10" cols="40"class="form-control" placeholder="Nombre del contacto" name="fecha_recepcion" >
			</div>

			<div class="form-group">
				<label for="">Hora de recepción</label>
				<input type="time" rows="10" cols="40"class="form-control" name="hora_recepcion" >
			</div>

			
			<div class="form-group">
				<button type="submit" name="submit"class="btn btn-primary">Agregar</button>
			
			</div>
		</form>
<form method="POST" action="almacenAdmin.php">
			
			<input type="submit" class="btn btn-primary" value="Regresar" />

 		</form>
	</div>

	</header><!--/header-->
	
	
		<section id="slider"><!--slider-->
				
					

	</div>	
		
<?php 
		if(isset($_SESSION['error'])){
        $_SESSION['error']=0;
      }
	?>
	
</body>

</html>