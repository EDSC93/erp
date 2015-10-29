<?php

$int= isset($_GET['intro']) ? $_GET['intro'] : null ;

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	<title>CRM</title>
	<style type="text/css">
	.row-centered
	{
		border:2px solid #1772fc;
		border-radius: 10px;
		margin-top: 10px;
		background: #eee;
	}
	.form-group
	{
		margin-top: 30px;
	}
	</style>
</head>
<body>
	<div class="container" style="margin-top:100px;">
		<div class="row-centered col-md-4 col-md-offset-4">
			<form class="form" method="post" action="php/recuperarphp.php">
				<div class="form-group">
					<label for="">Recuperar contraseña</label><span class="glyphicon glyphicon-user"></span>
				</div>
				<div class="form-group">
					
					<input type="text" name="correo" class="form-control"placeholder="Correo eléctronico"required>
					<?php if($int==1){
        echo "<font color='blue'>Datos enviandos,no olvide revisar correos no deseados.";
      }
      
      ?>
      <br>
       <label ><a href="index.php"> Regresar</a></label>
           
				</div>
			
				<div class="form-group col-md-offset-9">
		
            
					<button type="submit" class="btn btn-primary" name="btn_login">Enviar!</button>
				</div>

			</form>
		</div>
		
	</div>
</body>
</html>