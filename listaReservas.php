<?php 
//conexion a base de datos 
if($link = mysqli_connect("localhost", "ucymxbzr_estefi", "maimo!123", "ucymxbzr_movivet")){
//echo "se conecto";
//consulta
//$consulta="SELECT*FROM productos"; --> cambiamos para que no traiga todo esto si solo necesitamos tres osas 
$consulta="SELECT fecha,hora FROM reservado";
$respuesta= mysqli_query($link,$consulta);

$matriz=array(); //creamos un array 

while($obj=mysqli_fetch_object($respuesta)){
	$matriz[]=array('fecha' => $obj->fecha,'hora'=>utf8_encode($obj->hora)
	
	);
}

//convirtiendo datos a formato Json
echo json_encode($matriz); //-->le agrego un nombre para por lo menos ponerle un nombre a todo ese conjunto de objetos, o sea el array, le pongo l nombre a un array.


}else{
echo "no se conecto";
}
?>