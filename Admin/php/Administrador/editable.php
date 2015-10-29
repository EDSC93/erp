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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	
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
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Cuenta</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Iniciar sesion</a></li>
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
							
							
						</div>
					</div>					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Generos</td>
							
						</tr>
					</thead>
					<tbody class="producto">
						<tr>
							<td class="cart_description" width="40%" height="100px" >
							
								<?php 
									require_once  '../db_connect.php'; //obtener los datos para la coneccion.									
									$result=mysql_query("SELECT Genero FROM genero")or die(mysql_error());									
									while ($f=mysql_fetch_array($result)) 
									{											
								?>							
								<h4> <?php echo  $f['Genero']; ?>  </h4>								
								<?php 
								}
								if(isset($_SESSION['error']))
									{
										if($_SESSION['error']==1)
										{
											echo "<font color='red'>Genero Repetido.</font>";
										}
									}
								?>	
							</td>
							
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
		<section id="do_action" >
			<div class="container pull-right">			
				<div class="row">				
					<div class="col-sm-6" >
						<div class="total_area">
							<ul>
								<input type="text" value="" name="nombre" placeholder="Nombre del Genero" href="">
							</ul>								
								<a class="btn btn-default update" href="">Agregar Genero</a>							
						</div>
					</div>
				</div>
			</div>
		</section><!--/#do_action-->
	

</body>
</html>