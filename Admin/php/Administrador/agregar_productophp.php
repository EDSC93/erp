<?php
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
<html>
<head>
	<title>Pagina</title>
</head>
<body>
	<?php
	
		

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
		$ruta = "../../../productos/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			/*if ($resultado){
				echo "el archivo ha sido movido exitosamente";
			} else {
				echo "ocurrio un error al mover el archivo.";
			}*/
		} else {
 echo '<script language="javascript">
                alert("Nombre de imagen repetida");
                window.location.href = "agregar_producto.php";
          </script>';
			
			
		}
	} else {
		echo '<script language="javascript">
                alert("Formato no permitido o excede los 5MB");
               window.location.href = "agregar_producto.php";
          </script>';
	}
}

session_start(); 
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			$precio = $_POST['precio'];
			$genero = $_POST['genero'];
			$categoria = $_POST['categoria'];
			$subcategoria = $_POST['subcategoria'];
			$imagen = $_FILES['imagen']['name'];
			$seccion=$_POST['seccion'];
			$existencia=$_POST['existencia'];
			$proveedor=$_POST['proveedor'];
			$peso = $_POST['peso'];
			$altura = $_POST['altura'];
			$anchura = $_POST['anchura'];
			$profundidad = $_POST['profundidad'];
			$ventamaxima = $_POST['ventamaxima'];
			$ventaminima = $_POST['ventaminima'];
			$iva = $_POST['iva'];
			$visibilidad= $_POST['visibilidad'];
			

		
			$con=mysqli_connect("localhost", "root","","gamersoft");
			if(mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM  productos WHERE Nombre='".$nombre."'");
			if(mysqli_num_rows($result)==0){

				
				mysqli_query($con,"INSERT INTO productos(Nombre,Descripcion,Precio,ID_Categoria,ID_Subcategoria,Url_Imagen,Peso,Altura,Anchura,Profundidad,Venta_Minima,Venta_Maxima,Iva,Visibilidad) VALUES ('".$nombre."','".$descripcion."','".$precio."','".$categoria."','".$subcategoria."','".$imagen."','".$peso."','".$altura."','".$anchura."','".$profundidad."','".$ventaminima."','".$ventamaxima."','".$iva."','".$visibilidad."')");
				mysqli_query($con,"INSERT INTO categoria_subcategoria(ID_Categoria,ID_Subcategoria) VALUES ('".$categoria."','".$subcategoria."')");

				$id=mysqli_query($con,"SELECT ID_Producto FROM productos WHERE Nombre='".$nombre."'");
				while ($f=mysqli_fetch_array($id)) 
				{
				
		mysqli_query($con,"INSERT INTO producto_genero(ID_Producto,ID_Genero) VALUES ('".$f['ID_Producto']."','".$genero."')");
		mysqli_query($con,"INSERT INTO almacen(ID_Producto,Seccion,Existencia,ID_Proveedor) VALUES ('".$f['ID_Producto']."','".$seccion."','".$existencia."','".$proveedor."')");
		
			mysqli_close($con);
				
				}
			

			
				
				header("location: administrador.php");
			}
			else{
				
				$_SESSION['error'] = 1;
				echo "<script>history.go(-1) </script>"; 
			

			}
		
		
	 ?>
</body>
</html>