<?php
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
    <title>Panel | GamerSoft</title>
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
						<div class="logo pull-left">
							<a href=""><img src="./../../../images/home/logo.png" alt="" /></a>
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
							
							</ul>
						</div>
					</div>					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->


<section>
		<div class="col-sm-9 padding-right">
			<div class="features_items"><!--features_items-->
				<h2 class="title text-center">Cadena de suministros</h2>
					<div class="col-sm-4">
							<div class="product-image-wrapper">
								
									<button type="button" class="boton">
										<a href="categoria.php"><img src="./../../../images/home/categoria.png" alt="" /></a>
										<text> Categoría</text>
									</button>	
									
																
							</div>
						</div>	
							
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									
										<button type="button" class="boton">
											<a href="genero.php"><img src="./../../../images/home/gener.png" alt="" /></a>
											<text> Genero</text>
										</button>	
										
																	
								</div>
							</div>	
							
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									
										<button type="button" class="boton">
											<a href="almacenAdmin.php"><img src="./../../../images/home/almacen.jpg" alt="" /></a>
											<text> Almacen </text>
										</button>	
										
																	
								</div>
							</div>	
							
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									
										<button type="button" class="boton">
											<a href="proveedoresAdmin.php"><img src="./../../../images/home/provee.png" alt="" /></a>
											<text> Proveedor </text>
										</button>	
										
																	
								</div>
							</div>	
							
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									
										<button type="button" class="boton">
											<a href="Administrador.php"><img src="./../../../images/home/Producto.png" alt="" /></a>
											<text> Producto </text>
										</button>	
										
																	
								</div>
							</div>	
							
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									
										<button type="button" class="boton">
											<a href="compraAdmin.php"><img src="./../../../images/home/compra.jpg" alt="" /></a>
											<text> Compra </text>
										</button>	
										
																	
								</div>
							</div>	
							
						
				</div>
			</div>				
		</div><!--features_items-->
				
				




<!--<div>
		<button type="button">
			<a href=""><img src="images/home/logo.png" alt="" /></a>
			<text> Gol</text>
		</button>
			<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Product name:</th>
			<td><input type="text" class="inp-form" /></td>
			<td></td>
		</tr>
		</table>			
	</div>				-->

</section>



</body>

</html>