<?php 
	session_start();
	include '.././conexion.php';
	if(isset($_SESSION['carrito'])){
		if (isset($_POST['id'])) {
			$arreglo=$_SESSION['carrito'];
			$encontro=false;
			$numero=0;
			for ($i=0; $i < count($arreglo); $i++) { 
				if($arreglo[$i]['Id']==$_POST['id']){
					$encontro=true;
					$numero=$i;
				}
			}
			if ($encontro==true) {
				$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
				$_SESSION['carrito']=$arreglo;
			}else{
				$nombre="";
				$precio=0;
				$imagen="";
				$re=mysql_query("select * from productos where ID_Producto=".$_POST['id']);
				while ($f=mysql_fetch_array($re)) {
					$nombre=$f['Nombre'];
					$precio=$f['Precio'];
					$imagen=$f['Url_Imagen'];
				}
				$datosNuevos=array('Id'=>$_POST['id'],
								'Nombre'=>$nombre,
								'Precio'=>$precio,
								'Imagen'=>$imagen,
								'Cantidad'=>1
								);
				array_push($arreglo, $datosNuevos);
				$_SESSION['carrito']=$arreglo;
			}
		}
	}else{
		if (isset($_POST['id'])) {
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysql_query("select * from productos where ID_Producto=".$_POST['id']);
			while ($f=mysql_fetch_array($re)) {
				$nombre=$f['Nombre'];
				$precio=$f['Precio'];
				$imagen=$f['Url_Imagen'];
			}
			$arreglo[]=array('Id'=>$_POST['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1
							);
			$_SESSION['carrito']=$arreglo;
		}
	}
	echo $_POST['id'];
?>