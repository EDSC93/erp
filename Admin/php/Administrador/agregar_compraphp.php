<?php
session_start();
if(!isset($_SESSION['Usuario'], $_SESSION['Password'])){
    header("location:../../index.php?error=1");
}
if($_SESSION['ID_Permisos']!=1)
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
	
	
			$empresa = $_POST['empresa'];
			$costo=$_POST['costo'];
			$fecha_orden=$_POST['fecha_orden'];
			$fecha_entrega=$_POST['fecha_entrega'];
			$aprobado = $_POST['aprobado'];
			
			

		
			$con=mysqli_connect("localhost", "root","","gamersoft");
			if(mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}

			

				
				mysqli_query($con,"INSERT INTO compra(ID_Proveedor,Costo_Total,Fecha_Orden,Fecha_Entrega,Aprobado) VALUES ('".$empresa."','".$costo."','".$fecha_orden."','".$fecha_entrega."','".$aprobado."')");
				
				
				$rs = mysqli_query($con,"SELECT @@identity AS id");
if ($row = mysqli_fetch_row($rs)) {
$id = trim($row[0]);
header("location: vistaagregarcompra.php?id=$id");
}
		
		
			mysqli_close($con);
				
				
			

			
				
				
		
		
	 ?>
</body>
</html>