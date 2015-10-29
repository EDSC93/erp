<?php 
	include '../conexion.php';
	
	$re=mysql_query("select * from compra_producto where ID_Compra=".$_POST['id']);
	$producto= array();
	while ($f=mysql_fetch_array($re)) {
		$req=mysql_query("select Nombre from productos where ID_Producto=".$f['ID_Producto']);
		$fq=mysql_fetch_array($req);
			$datosNuevos=array( 'Producto'=>$fq['Nombre'],
								'Precio'=>$f['Precio'],
								'Cantidad'=>$f['Cantidad']
								);
			array_push($producto, $datosNuevos);
			unset($req);
		}
	echo json_encode($producto);
?>