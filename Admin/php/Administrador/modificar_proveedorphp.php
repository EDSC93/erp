<!DOCTYPE html>
<html>
<head>
	<title>Pagina</title>
</head>
<body>
	<?php
	
	
session_start(); 
			$empresa = $_POST['empresa'];
			$direccion = $_POST['direccion'];
			$telefono = $_POST['telefono'];
			$contacto = $_POST['contacto'];
			
			$id=$_GET['id'];

		
			$con=mysqli_connect("localhost", "root","","gamersoft");
			if(mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}

		//	$result = mysqli_query($con,"SELECT * FROM  productos WHERE Nombre='".$nombre."'");
			//if(mysqli_num_rows($result)==0){

				 
   				mysqli_query($con,"UPDATE proveedores SET Empresa='$empresa', Direccion='$direccion', Telefono='$telefono', Contacto='$contacto' WHERE ID_Proveedores=$id");
  				

				//mysqli_query($con,"INSERT INTO productos(Nombre,Descripcion,Precio,ID_Categoria,ID_Subcategoria,Url_Imagen,Peso,Altura,Anchura,Profundidad,Venta_Minima,Venta_Maxima,Iva,Visibilidad) VALUES ('".$nombre."','".$descripcion."','".$precio."','".$categoria."','".$subcategoria."','".$imagen."','".$peso."','".$altura."','".$anchura."','".$profundidad."','".$ventaminima."','".$ventamaxima."','".$iva."','".$visibilidad."')");
				mysqli_close($con);
			
				
		
		
			header("location: proveedoresAdmin.php");
			
			//}
			//else{
				
				//$_SESSION['error'] = 1;
			//	echo "<script>history.go(-1) </script>"; 
			

		//	}
		
		
	 ?>
</body>
</html>