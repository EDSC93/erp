<?php
/*
 *Esto permite que el usuario acceda a su cuenta y pueda usar el sistema.
 *El usuario debe estar registrado en la BD.
*/

require_once __DIR__ . '/db_connect.php'; //obtener los datos para la coneccion.
$db = new DB_CONNECT(); //crear la coneccion

//Obtener los datos del formulario
$usercorreo= $_POST['correo'];




//Consultar en la BD
$result = mysql_query("SELECT * FROM login,encargado WHERE encargado.correo = '".$_POST["correo"]."' AND login.ID_login=encargado.Id_login");
$count = mysql_num_rows($result); //Obtener numero de resultados

if($count>0){ //Verificar que solo exista un registro
    $row = mysql_fetch_assoc($result); //obte la fila del Usuario


$encargado=$row['Nombre'];
$encargadoapellido =  $row['Apellido_P'];
$correor =  $row['Correo'];
$titular = $row['User'];
$password = $row['Password'];
$subject = "Recuperar datos del panel de acceso";
$message ='
<html>
<head>
<style> 
body { background: 
    #FFFFFF; 
    color: #000000; 
     font-family: sans-serif;  
} 

h1
  {
        font-size: 15px;
        font-weight:bold;
        color: #0000FF; 
        font-family: sans-serif; 
  }
</style>

  <title>ClothModel</title>
</head>
<body>


  
<table id="Table_01" width="100%" height="30" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
   
   

              <tr>

                 <td width="30%" valign="bottom" style="position:absolute;top:0px;left:0px">
              <a href="http://alertdeal.edsc93.com/acceso.php" ><img  style ="width:200px;height:130px " src="http://www.alertdeal.edsc93.com/img/alert.jpg"></a>                 
           
           <td>      
<label style="font-size: 25pt; color: white ;font-family: cursive;"> EL CRM creado para tus necidades </label>
</td>
              </tr>
         </table>
   </table>

<b>
&iexcl;Estimado/a '; $message.="$encargado $encargadoapellido";
$message.='!
<br>
<br>
Los datos que registraron para entrar al panel de servicio son los siguientes:
<br>
<br>
Nombre de usuario: '; $message.="<font color='red'> $titular </font color>";
$message.='
<br>
Contrase&ntilde;a: '; $message.=" <font color='red'> $password  </font color>";
$message.='
<br>
<br>
Si usted no solicit&oacute; recuperar los datos de inicio de sesi&oacute;n por favor reportelo de
forma inmediata al 01-800-456-789, ya que podria sufrir de robo de identidad.
<br>
Estamos a su disposici&oacute;n, saludos.
<br>
<br>
</b>




<h1>
<b>
 Equipo AlertDeal
  <br>
  
</b>
</h1>
<a   href="http://www.alertdeal.edsc93.com/acceso.php"> <P  ALIGN=right>Alertdeal.Com<a/>
</body>
</html>


';


//$from = "info@clothmodel.edsc93.com";
// Cabecera que especifica que es un HMTL
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Cabeceras adicionales
$cabeceras .= 'From: AlertDeal <info@clothmodel.edsc93.com>' . "\r\n";
//$cabeceras .= 'Cc: edsc_93@hotmail.com' . "\r\n";
$cabeceras .= 'Bcc: edsc_93@hotmail.com' . "\r\n";

mail($correor,$subject,$message,$cabeceras);
    

header('Location: ../recuperar.php?intro=1');


  //  header("location:home.php");
}
else{ //Inicio Fallido

    echo '<script language="javascript">
                alert("Correo no existe o mal escrito");
                window.location.href = "../recuperar.php";
          </script>';
}


?>