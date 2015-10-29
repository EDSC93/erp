<!DOCTYPE html>
<html>
<head>
	<title>Pagina</title>
</head>
<body>
	<?php
	
	/*

	if ($_FILES["imagen"]["error"] > 0){
	echo '<script language="javascript">
                alert("Seleccione una imagen");
          </script>';
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 5120;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			/*if ($resultado){
				echo "el archivo ha sido movido exitosamente";
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		
	} else {
		echo '<script language="javascript">
                alert("Formato no permitido o excede los 5MB");
               window.location.href = "modificar_producto.php";
          </script>';
	}
}
*/
session_start(); 
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			$precio = $_POST['precio'];
			$categoria = $_POST['categoria'];
			$subcategoria = $_POST['subcategoria'];
			//$imagen = $_FILES['imagen']['name'];
			$peso = $_POST['peso'];
			$altura = $_POST['altura'];
			$anchura = $_POST['anchura'];
			$profundidad = $_POST['profundidad'];
			$ventamaxima = $_POST['ventamaxima'];
			$ventaminima = $_POST['ventaminima'];
			$iva = $_POST['iva'];
			$visibilidad= $_POST['visibilidad'];
			$id=$_GET['id'];

		
			$con=mysqli_connect("localhost", "root","","gamersoft");
			if(mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}

		//	$result = mysqli_query($con,"SELECT * FROM  productos WHERE Nombre='".$nombre."'");
			//if(mysqli_num_rows($result)==0){

				 
   				mysqli_query($con,"UPDATE productos SET Nombre='$nombre', Descripcion='$descripcion', Precio='$precio',Peso='$peso',ID_Categoria='$categoria',ID_Subcategoria='$subcategoria', Altura='$altura',Anchura='$anchura',Profundidad='$profundidad',Venta_Maxima='$ventaminima',Venta_Maxima='$ventamaxima',Iva='$iva',Visibilidad='$visibilidad' WHERE ID_Producto=$id");
  				

				//mysqli_query($con,"INSERT INTO productos(Nombre,Descripcion,Precio,ID_Categoria,ID_Subcategoria,Url_Imagen,Peso,Altura,Anchura,Profundidad,Venta_Minima,Venta_Maxima,Iva,Visibilidad) VALUES ('".$nombre."','".$descripcion."','".$precio."','".$categoria."','".$subcategoria."','".$imagen."','".$peso."','".$altura."','".$anchura."','".$profundidad."','".$ventaminima."','".$ventamaxima."','".$iva."','".$visibilidad."')");
				mysqli_close($con);
			
				
		
		
			header("location: administrador.php");
		
		
			//}
			//else{
				
				//$_SESSION['error'] = 1;
			//	echo "<script>history.go(-1) </script>"; 
			

		//	}
		
		
	 ?>
</body>
</html>