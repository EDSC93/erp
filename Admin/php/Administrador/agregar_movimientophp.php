<?php
session_start();
	$userid= $_SESSION['ID_Usuario'];
if(!isset($_SESSION['Usuario'], $_SESSION['Password'])){
    header("location:../../index.php?error=1");
}
/*if($_SESSION['ID_Permisos']!=1)
    {
        header("location:../../index.php?error=2");
    }*/
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
	
			
	
			
			$producto = $_POST['producto'];
			$cantidad=$_POST['cantidad'];
			$fecha_recepcion=$_POST['fecha_recepcion'];
			$hora=$_POST['hora_recepcion'];
			
			
			
			

		
			$con=mysqli_connect("localhost", "root","","gamersoft");
			if(mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}

			
				

				
				mysqli_query($con,"INSERT INTO movimiento_almacen(ID_Producto,Movimiento,Cantidad,ID_Usuario,Fecha,Hora) VALUES ('".$producto."','Entrada','".$cantidad."','".$userid."','".$fecha_recepcion."','".$hora."')");
				
				$ida=mysqli_query($con,"SELECT Existencia FROM almacen WHERE ID_Producto='".$producto."'");
				while ($f=mysqli_fetch_array($ida)) 
				{
				
					$viejacantidad=$f['Existencia'];
					$nuevacantidad=$cantidad+$viejacantidad;
					echo "$nuevacantidad";
					mysqli_query($con,"UPDATE almacen SET  Existencia='$nuevacantidad' WHERE ID_Producto=$producto");

				mysqli_close($con);
				
				
				}

			
			
			
				header("location: almacenAdmin.php");
				
			
		
		
	 ?>
</body>
</html>