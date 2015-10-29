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
	
			$re=$_GET['id'];
	
			
			$producto = $_POST['producto'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			
			
			

		
			$con=mysqli_connect("localhost", "root","","gamersoft");
			if(mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: ".mysqli_connect_error();
			}

			
				$result = mysqli_query($con,"SELECT * FROM  compra_producto WHERE ID_Producto=$producto AND ID_Compra=$re. ");
			if(mysqli_num_rows($result)==0){

				
				mysqli_query($con,"INSERT INTO compra_producto(ID_Compra,ID_Producto,Precio,Cantidad) VALUES ('".$re."','".$producto."','".$precio."','".$cantidad."')");
				mysqli_close($con);
				
				
			

			
				header("location: vistaagregarcompra.php?id=$re");
				//header("location: administrador.php");
			
		}
		else{
				
				$_SESSION['error'] = 1;
				echo "<script>history.go(-1) </script>"; 
			

			}
		
	 ?>
</body>
</html>