<?php
include 'cn.php';
//Recibir los datos y almacenarlos en variables
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
//Consulta
$insertar = "INSERT INTO usuarios(nombre,apellidos,correo,usuario,clave,telefono,direccion) VALUES ('$nombre','$apellidos','$correo','$usuario','$clave','$telefono','$direccion')";

//no repetir usuario que ya existe

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario)>0){ 
//si existe me devuelve 1 entonces si existe 
	header("location:error.html");
	exit; //para que no se ejecute igual
}


//Ejecutar consulta
$resultado= mysqli_query($conexion,$insertar);

if(!$resultado) {
	header("location:error.html");
}
else{
	header("location:index.html");
}

//cerrar conexion 
mysqli_close($conexion);


?>
