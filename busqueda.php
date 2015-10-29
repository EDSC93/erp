<?php 
	function Buscar($datos,$re)
	{
		while ($f=mysql_fetch_array($re)) {
			if(count($datos)==0)
			{
				$datosNuevos=array('Id'=> $f['ID_Producto'],
							'Nombre'=>$f['Nombre'],
							'Precio'=>$f['Precio'],
							'Imagen'=>$f['Url_Imagen']
							);
				array_push($datos, $datosNuevos);
			}
			else{
				$Encontrado=false;
				for ($j=0; $j < count($datos); $j++) {
					if($datos[$j]['Id'] == $f['ID_Producto'])
					{
						$Encontrado=true;
					}
				}
				if ($Encontrado==false) {
					$datosNuevos=array('Id'=> $f['ID_Producto'],
							'Nombre'=>$f['Nombre'],
							'Precio'=>$f['Precio'],
							'Imagen'=>$f['Url_Imagen']
							);
					array_push($datos, $datosNuevos);
				}
			}
		}
		return $datos;
	}
?>