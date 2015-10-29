<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
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
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +52 9999 43 53 21</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> gamersoft@hotmail.com</a></li>									
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
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Cuenta</a></li>							
								<li><a href="cart.php" class="active"><i class="fa fa-shopping-cart"></i> Carrito </a></li>
								<li><a href=""><i class="fa fa-lock"></i> Iniciar sesion</a></li>
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
							<td class="image">Imagen</td>
							<td class="description">Descripcion</td>
							<td class="price">Precio</td>
							<td class="quantity">Cantidad</td>
							<td class="total">SubTotal</td>
							<td>Eliminar</td>
						</tr>
					</thead>
					
				
<?php 
		$total=0;
		if (isset($_SESSION['carrito'])) {
				$datos=$_SESSION['carrito'];
					for ($i=0; $i < count($datos); $i++) {
								
?>					
					
					<tbody class="producto">
						<tr>
							<td class="cart_product" width="20%">
								<a href=""><img src="./productos/<?php echo $datos[$i]['Imagen']; ?>" width = "100px" height = "100px" alt=""></a>
							</td>
							<td class="cart_description" width="20%" height="100px" >
								<h4><a href=""> <?php echo $datos[$i]['Nombre']; ?> </a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price" width="20%" height="100px" >
								<p> Precio: <?php echo $datos[$i]['Precio']; ?> </p>
							</td>
							<td class="cart_quantity" width="20%" height="100px" >
								<div class="cart_quantity_button">
									Cantidad: 									
									<input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
									data-precio="<?php echo $datos[$i]['Precio']; ?>"
									data-id="<?php echo $datos[$i]['Id']; ?>"
									class="cantidad">
								</div>
							</td>
							<td class="cart_total" width="20%" height="100px" >
								<p class="cart_total_price"> <?php echo $datos[$i]['Precio']*$datos[$i]['Cantidad']; ?> </p>
							</td>
							<td class="cart_delete" >
								<a href="./cart.php" class="cart_quantity_delete" data-id="<?php echo $datos[$i]['Id']; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
			<?php
				$total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
				}
			}else{
				echo "<center><h2>El carrito de compras esta vacio</h2></center>";
			}
	?>							
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total <span id = "total"> <?php echo $total; ?>  </span></lis>
						</ul>
							<a class="btn btn-default update" href="">Realizar pago</a>							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">				
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Servicios</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Ayuda en linea</a></li>
								<li><a href="">Contactanos</a></li>
								<li><a href="">Estado del pedido</a></li>
								<li><a href="">Cambiar locacion</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Politicas</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terminos de uso</a></li>
								<li><a href="">Politicas de privacidad</a></li>
								<li><a href="">Politicas de envio</a></li>
								<li><a href="">Sistema de pago</a></li>								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Acerca de nosotros</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Informacion de la compañia</a></li>								
								<li><a href="">Localizacion de la compañia</a></li>								
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 GamerSoft Inc. All rights reserved.</p>
					<p class="pull-right">Creado por: <span><a target="_blank" href="#">Equipo 1</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>