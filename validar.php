<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//conectar a la base de datos 

$conexion=mysqli_connect("localhost","root","","movivet");
//$conexion=mysqli_connect("localhost","ucymxbzr_estefi","maimo!123","ucymxbzr_movivet");
$consulta="SELECT * FROM usuarios WHERE usuario='$usuario' and clave='$clave'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
if($filas>0){
	header("location:reservar.html");
}else{
	header("location:error1.html");
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>