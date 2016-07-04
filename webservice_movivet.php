<?php
//CHEQUEAR LUGARES LIBRES
//conexion a base de datos
if($link = mysqli_connect("localhost","ucymxbzr_estefi","maimo!123","ucymxbzr_movivet"))
{
	echo "se conecto";
	$consulta="SELECT fecha,hora FROM reservado WHERE id_reserva=1";
	$respuesta = mysqli_query($link,$consulta);	
	
	$matriz = array();
	
	while($obj = mysqli_fetch_object($respuesta))
	{
		$matriz[]= array('fecha'=>$obj->fecha, 'hora'=>utf8_encode($obj->hora)
		);		
		}	
	echo json_encode($matriz);
	
	
}
else
{
	echo "No se conecto";
}
?>