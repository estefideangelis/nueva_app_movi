<?php
$reserva = $_POST["turnos"];


if($link = mysqli_connect("localhost","ucymxbzr_estefi","maimo!123","ucymxbzr_movivet"))
{
	//echo "se conecto";
	$consulta="SELECT fecha FROM reservado WHERE id_reserva=1";
	$respuesta = mysqli_query($link,$consulta);	
	$obj = mysqli_fetch_object($respuesta);

	
	if(($obj->fecha - $reserva)&&($obj->hora - $reserva)>=0)
	{
		$disp = $obj->fecha - $reserva;
		$disp = $obj->hora - $reserva;
		$restar_mesas="UPDATE reservado SET fecha = '$disp' WHERE id_reserva=1";
		if(mysqli_query($link,$restar_mesas))
		{
			/*
			$matriz[]= array('feedback'=>'Reserva hecha!');	
			$matriz_json = json_encode($matriz);
			echo $_GET['jsoncallback'].$matriz_json;
			*/
			echo "Se ha realizado la reserva correctamente!";

		}
		else{
			$matriz[]= array('feedback'=>'Ocurrio un error!'
			);	
			$matriz_json = json_encode($matriz);
			echo $_GET[‘jsoncallback’] . ‘(‘ . $matriz_jason . ‘);
		}
	}
	else
	{
		$matriz[]= array('feedback'=>'Ya está ocupado!'
			);	
			$matriz_json = json_encode($matriz);
			echo $_GET[‘jsoncallback’] . ‘(‘ . $matriz_jason . ‘);
		}
	
}
else
{
	echo json_encode("No se conecto");
}

?>