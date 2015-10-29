<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | GamerSoft</title>
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
								<li><a href="#"><i class="fa fa-phone"></i> +52 9999 43 53 21</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> gamersoft@hotmail.com</a></li>	
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
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
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Carrito de compra</a></li>
								<li><a href=""><i class="fa fa-lock"></i> Iniciar sesion</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->


<?php 
		include 'conexion.php';
		include 'busqueda.php';
		$datos = array();
		if(isset($_GET['categoria']))
		{
			$re=mysql_query("select productos.ID_Producto,Nombre,Precio,Url_Imagen from productos,categoria where  Visibilidad=1 and productos.ID_Categoria=categoria.ID_Categoria and categoria.ID_Categoria =".$_GET['categoria']."")or die(mysql_error());
			$datos=Buscar($datos,$re);
			unset($re);
		}
		else
			if (isset($_GET['genero'])) {
			$re=mysql_query("select productos.ID_Producto,Nombre,Precio,Url_Imagen from productos,producto_genero,genero where  Visibilidad=1 and productos.ID_Producto=producto_genero.ID_Producto and producto_genero.ID_Genero=genero.ID_Genero and   genero.ID_Genero=".$_GET['genero']."")or die(mysql_error());
			$datos=Buscar($datos,$re);
			echo count($datos);
			unset($re);
		}
		else if(isset($_GET['q'])){ 
			$busqueda = explode(" ", $_GET['q']);
			for ($i=0; $i < count($busqueda); $i++) {
				$re=mysql_query("select productos.ID_Producto,Nombre,Precio,Url_Imagen from productos,categoria where  Visibilidad=1 and productos.ID_Categoria=categoria.ID_Categoria and (Tipo like '%".$busqueda[$i]."%')")or die(mysql_error());
				$datos=Buscar($datos,$re);
				unset($re);
				$re=mysql_query("select productos.ID_Producto,Nombre,Precio,Url_Imagen from productos,producto_genero,genero where  Visibilidad=1 and productos.ID_Producto=producto_genero.ID_Producto and producto_genero.ID_Genero=genero.ID_Genero and (genero like  '%".$busqueda[$i]."%')")or die(mysql_error());
				$datos=Buscar($datos,$re);
				unset($re);
				$re=mysql_query("select productos.ID_Producto,Nombre,Precio,Url_Imagen from productos where  Visibilidad=1 and (Nombre like  '%".$busqueda[$i]."%')")or die(mysql_error());
				$datos=Buscar($datos,$re);
				unset($re);
				}
			
		}
		else{
			$re=mysql_query("select * from productos where Visibilidad=1")or die(mysql_error());
			$datos=Buscar($datos,$re);
			unset($re);
		}
?>



	
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
								
								<?php
									$RE=mysql_query("select * from categoria ");
									while ($f=mysql_fetch_array($RE)){
								?>
								
								<li class="dropdown"><a href="./index.php?categoria=<?php echo $f["ID_Categoria"];  ?>"> <?php echo $f["Tipo"];  ?> </a>
                                							<?php } ?>

                                </li> 
												
							</ul>
						</div>
					</div>
					
					<form action="./" method="get">
						<input name="q" />
						<input type="submit" value="Buscar" />
					</form>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>GamerSoft</h1>
									<h2>Proximamente</h2>
									<p>La oferta para ti. </p>
									<button type="button" class="btn btn-default get">Obtenlo ahora</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<!--<img src="images/home/pricing.png"  class="pricing" alt="" /> -->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1>GamerSoft</h1>
									<h2>Proximamente </h2>
									<p>La oferta para ti. </p>
									<button type="button" class="btn btn-default get">Obtenlo ahora</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<!--<img src="images/home/pricing.png"  class="pricing" alt="" />   -->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1>GamerSoft</h1>
									<h2>Proximamente</h2>
									<p>La oferta para ti. </p>
									<button type="button" class="btn btn-default get">Obtenlo ahora</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/pricing.png" class="pricing" alt="" />   -->
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Género</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							<?php
									
									$RE=mysql_query("select * from genero ");
									while ($f=mysql_fetch_array($RE)){
							?>
							
							
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="./index.php?genero=<?php echo $f["ID_Genero"];  ?>">
											<?php echo $f["Genero"];  ?>
										</a>
									</h4>
								</div>
								
								
							</div>
							
							
							
							
							<?php } ?>
							
							
							

						</div><!--/category-products-->
					
						
						
						<div class="price-range"><!--price-range-->
							<h2>Rango de precio</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->												
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Productos</h2>
						<?php
							for ($j=0; $j < count($datos); $j++) {
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">								
										<div class="productinfo text-center">										
											<img src= "./productos/<?php echo $datos[$j]['Imagen'];?>" alt="" /><br>
											<?php echo $datos[$j]['Precio'];?></span>											
											<p> <?php echo $datos[$j]['Nombre'];?>  </p>
										</div>										
										
										<div class="product-overlay">
											<div class="overlay-content">
												<a href="./product-details.php?id=<?php echo $datos[$j]['Id']?>" class="btn btn-default add-to-detalles"><i class= "fa fa-shopping.cart"></i> Detalles </a>
												<a href="" class="btn btn-default add-to-cart" data-id="<?php echo $datos[$j]['Id'];?>" ><i class= "fa fa-shopping.cart"></i>Agregar al carrito</a>
											</div>
										</div>
								</div>
								
							</div>
						</div>
						<?php
								}
						?>
				</div>
			</div>				
		</div><!--features_items-->
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Productos recomendados</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Audifonos</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Audifonos</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Audifonos/p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Audifonos</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Audifonos</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Audifonos</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
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
					<p class="pull-right">Creado por:  <span><a target="_blank" href="#">Equipo 1</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>