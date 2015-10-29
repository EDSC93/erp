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
		$ruta = "../../../productos/proveedor/" . $_FILES['imagen']['name'];
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
                window.location.href = "agregar_proveedor.php";
          </script>';
			
			
		}
	} else {
		echo '<script language="javascript">
                alert("Formato no permitido o excede los 5MB");
               window.location.href = "agregar_proveedor.php";
          </script>';
	}
}


			$empresa = $_POST['empresa'];
			$direccion=$_POST['direccion'];
			$telefono=$_POST['telefono'];
			$contacto=$_POST['contacto'];
			$imagen = $_FILES['imagen']['name'];
			
			

		
			$con=mysqli_connect("localhost", "root","","gamersoft");
			if(mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM  proveedores WHERE Empresa='".$empresa."'");
			if(mysqli_num_rows($result)==0){

				
				mysqli_query($con,"INSERT INTO proveedores(Empresa,Direccion,Telefono,Contacto,Url_Imagen) VALUES ('".$empresa."','".$direccion."','".$telefono."','".$contacto."','".$imagen."')");
				mysqli_close($con);
				
				
			

			
				
				header ("location: proveedoresAdmin.php");
			}
			else{
				
				$_SESSION['error'] = 1;
				echo "<script>history.go(-1) </script>"; 
			

			}
		
		
	 ?>
</body>
</html>