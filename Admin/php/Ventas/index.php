<?php
session_start();
if(!isset($_SESSION['Usuario'], $_SESSION['Password'])){
    header("location:../../index.php?error=1");
}
if($_SESSION['ID_Permisos']!=8)
    {
        header("location:../../index.php?error=2");
    }
require_once '../db_connect.php'; //obtener los datos para la coneccion.
$db = new DB_CONNECT(); //crear la coneccion

$query1=mysql_query("SELECT  Nombre, Fecha_registro FROM usuario ORDER BY Fecha_registro DESC LIMIT 5");
$query2=mysql_query("SELECT  Fecha_inicio FROM promociones ORDER BY Fecha_inicio DESC LIMIT 3")
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link media="all" href="http://www.grabthiscode.com/wp-content/themes/grabthiscode/css/style.css" type="text/css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700&v2">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
	<script src="../js/bootstrap.min.js"></script>
	<title>Ventas</title>
	<style type="text/css">
.nav
	{
		background: #CEF6F5;
	}

		li:active{
			border: 2px solid #2196F3;
		}
        #main{
            display: flex;
            margin-top: 100px;
        }
        aside{

            border-radius: 10px;

            width: 700px;

            display: inline-block;
            padding-left: 30px;
            padding-right: 30px;

            /*para el scroll*/
            overflow: auto;
            height: 500px;

        }

        #titscroll{
            margin:  15px;
            color:#171A71;
        }

        h1{
            color:#171A71;
        }

        h5{

            color: #673AB7;
            font-size: 16px;
        }

        #noticias{

            margin-left: 100px;

        }

	</style>
	
</head>
<body >
	<nav class="nav navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
 				<a href="../../index.php" ><img style ="width:230px; height:70px "  src="../../img/logo.png"  href="home.php" class="img-responsive" alt="Responsive image">	</a>
 			</div>
 			<!--<ul class="nav navbar-nav nav-tabs">
			  <li role="presentation"><a href="clientes/clientes.php">Clientes
			  	<span class="glyphicon glyphicon-user"></span></a></li>
			  <li role="presentation"><a href="promociones/promociones.php">Promociones 
			  	<span class="glyphicon glyphicon-shopping-cart"></span></a></li>
			  
			  <li role="presentation"><a href="reportes/reportes.php">Reportes 
			  	<span class="glyphicon glyphicon-stats"></span></a></li>
			</ul>-->
			<ul class="nav navbar-nav navbar-right nav-tabs">
			  <li role="presentation"><a ><span class="glyphicon glyphicon-user"></span><?php echo " Bienvenido  <b>".$_SESSION['Password']."</b> tú ID es: <b>".$_SESSION['ID_Permisos']."</b>"  ?></a></li>
			  <li role="presentation"><a href="../logout.php">Cerrar Sesión <span class="glyphicon glyphicon-off"></span>
			  </a></li>
			</ul>
		</div>
	</nav>

	<!--<div class="container">

        <div id="main">
            <aside>
                <br><br><br>
                <h3 id="titscroll">Actividad Reciente</h3>
                <br><br>
                <h5>Ultimos registros: </h5>
                   <?php
                  //  while($row=mysql_fetch_array($query1)){
                   //     echo "<p>Se registro el usuario  <b>".$row['Nombre']."</b> el ".$row['Fecha_registro']."</p>";
                    //}
                    ?>
                <br><br>
                <h5>Promociones recientes: </h5>
                <?php
              //  while($row=mysql_fetch_array($query2)){
                //    echo "<p>Se agregó una nueva <a href='promociones/promociones.php'>promoción</a> el  ".$row['Fecha_inicio']."</p>";
                //}
                ?>
            </aside>
            <div id="noticias">
                <h1>Bienvenido a AlertDeal<br><small>Resúmen General</small></h1>
                <br><br>
                <h2><small>Es un CRM análitico que proporciona información acerca de productos y ofertas de distintos
                        establecimientos en la ciudad de Mérida; con esta aplicación pretendemos impulsar
                        aquellos negocios que quieran incrementar ventas y darse a conocer en el mercado competitivo.</small></h2>
            </div>

        </div>


	</div>-->
</body>
</html>
		
	