<?php
$err = isset($_GET['error']) ? $_GET['error'] : null ;

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	  <link href="css/agency.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	<title>Panel de acceso</title>
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



	</style>
</head>
<body>
	<nav class="nav navbar-fixed-top">
		<div class="container">
			<div  class="navbar-header">
 			<a href="http://alertdeal.edsc93.com/" ><img style ="width:510px; height:110px "  src="img/logo.png"  href="home.php" class="img-responsive" alt="Responsive image">	</a>
		</div>
<!--
<ul class="nav navbar-nav navbar-right nav-tabs">
			  <li role="presentation"><a href="index.html">Inicio
			  	<span class="ico glyphicon glyphicon-home"></span></a></li>
			  <li role="presentation"><a href="index.html#services">¿Qué es AlertDeal?
			  	<span class="ico glyphicon glyphicon-question-sign"></span></a></li>
			  <li role="presentation"><a href="acceso.php">Acceso a clientes
			  	<span class="ico glyphicon glyphicon-arrow-right"></span></a></li>
			  <li role="presentation"><a href="php/vistaencargado.php">Registrar empresa
			  	<span class="ico glyphicon glyphicon-warning-sign"></span></a></li>
			</ul>
		</div>
-->

	</nav>
	

	<div class="container" style="margin-top:100px;">
		<div class="row-centered col-md-4 col-md-offset-4">
			<form class="form" method="post" action="php/login.php">
				<div class="form-group">
					<label for="">Iniciemos Sesión</label><span class="glyphicon glyphicon-user"></span>
				</div>
				<div class="form-group">
					
					<input type="text" name="username" class="form-control"placeholder="Usuario"required>
				</div>
				<div class="form-group">
				
					<input type="password" name="password" class="form-control"placeholder="Contraseña"required>
				</div>
				
         <label style="font-size: 9pt"><a href="recuperar.php"> ¿Olvidaste tu usuario o contraseña?</a></label>
				<div class="form-group col-md-offset-9">
					<button type="submit" class="btn btn-primary" name="btn_login">Vamos!</button>
				</div>

          <?php if($err==1){
        echo "<font color='red'><b>Debe de iniciar sesion.</b></font>";
      }
      if($err==2){
        echo "<font color='red'><b>Acceso denegado.</b></font>";
      }
      ?>
			</form>
		</div>
		
	</div>
</body>
  <footer>
        <div class="container">
            <div class="row">
                <div >
                    <center>
                    <span class="copyright">Copyright &copy; GamerSoft 2015</span>
                </center>
                </div>
                
                
            </div>
        </div>
    </footer>
	</center>
</html>