<?php
include 'cn.php';
//Recibir los datos y almacenarlos en variables
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

//Consulta
$insertar = "INSERT INTO reservado(fecha,hora) VALUES ('$fecha','$hora')";

//no repetir usuario que ya existe

$verificar_reserva = mysqli_query($conexion, "SELECT * FROM reservado WHERE fecha='$fecha' and hora='$hora'");
if(mysqli_num_rows($verificar_reserva)>0){ 
//si existe me devuelve 1 entonces si existe 
	header("location:error2.html");
	exit; //para que no se ejecute igual
}


//Ejecutar consulta
$resultado= mysqli_query($conexion,$insertar);

if(!$resultado) {
	header("location:error2.html");
}
else{
	header("location:index.html");
}

//cerrar conexion 
mysqli_close($conexion);


?>
