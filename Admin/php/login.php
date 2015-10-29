<?php
/*
 *Esto permite que el usuario acceda a su cuenta y pueda usar el sistema.
 *El usuario debe estar registrado en la BD.
*/

require_once __DIR__ . '/db_connect.php'; //obtener los datos para la coneccion.
$db = new DB_CONNECT(); //crear la coneccion

//Obtener los datos del formulario
$username = $_POST['username'];
$userpass= $_POST['password'];

//Proteccion contra MySQL injection
$username = stripslashes($username);
$userpass = stripslashes($userpass);
$username = mysql_real_escape_string($username);
$userpass = mysql_real_escape_string($userpass);

//Consultar en la BD
//$result = mysql_query("SELECT * FROM login, encargado WHERE login.User='$username' and login.Password='$userpass' AND login.ID_login=encargado.ID_login");
$result = mysql_query("SELECT * FROM usuario,permisos WHERE usuario.Usuario='$username' and usuario.Password='$userpass' AND usuario.ID_Permisos=permisos.ID_Permisos");

$count = mysql_num_rows($result); //Obtener numero de resultados


if($count==1){ //Verificar que solo exista un registro
    $row = mysql_fetch_assoc($result); //obte la fila del Usuario
    session_start();
    $_SESSION['ID_Usuario'] = $userid;
    $_SESSION['Password'] = $userpass;
    $_SESSION['Usuario']= $row['Usuario'];
    $_SESSION['ID_Permisos']= $row['ID_Permisos'];
	$_SESSION['ID_Usuario']= $row['ID_Usuario'];
   

   $Tipo=$row['Tipo'];


switch($Tipo){
                    
                    case 'Administrador':
                        header('Location: Administrador/index.php');
                        break;
                        
                    case 'Scm':
                        header('Location: SCM/index.php');
                        break;

                    case 'Crm':
                        header('Location: CRM/index.php');
                        break;

                    case 'Ventas':
                        header('Location: Ventas/index.php');
                        break;
                    
                }

                

    
    
}
else{ //Inicio Fallido

    echo '<script language="javascript">
                alert("Password o Usuario incorrecto!, Intente de nuevo.");
                window.location.href = "../index.php";
          </script>';
}


?>