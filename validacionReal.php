<?php
header('Content-Type: text/javascript; charset=UTF-8'); 
$resultados = array();

$conexion = mysqli_connect("localhost", "ucymxbzr_estefi", "maimo!123", "ucymxbzr_movivet");
mysqli_query($conexion, "SET NAMES 'UTF8'");




/* Extrae los valores enviados desde la aplicacion movil */
$usuarioEnviado = $_GET['usuario'];
$passwordEnviado = $_GET['password'];

/* revisar existencia del usuario con la contraseña en la bd */
$sqlCmd = "SELECT nombreUsuario, password, idUsuario FROM usuarios
WHERE nombreUsuario
LIKE '".mysqli_real_escape_string($conexion,$usuarioEnviado)."' 
AND password ='".mysqli_real_escape_string($conexion,$passwordEnviado)."'
LIMIT 1";


$sqlQry = mysqli_query($conexion,$sqlCmd);

if(mysqli_num_rows($sqlQry)>0){

	$login=1;


}else{

	$login=0;


}




$resultados["validacion"] = "neutro";



if( $login==1 ){



$resultados["validacion"] = "ok";


}else{


$resultados["validacion"] = "error";
}


$resultadosJson = json_encode($resultados);

/*muestra el resultado en un formato que no da problemas de seguridad en browsers */
echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';

?>