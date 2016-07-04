$(document).ready(function(){
// Chequeo conexión //
if(navigator.onLine){
$( "body" ).pagecontainer( "change", "#presentacion");
}

else{
	$( "body" ).pagecontainer( "change", "#presentacion1");
	$("#intentarNuevamente").on("click", function(){
	if(checkConection()){
		$( "body" ).pagecontainer( "change", "#presentacion");
	}
});

}

function checkConection(){
	if(navigator.onLine){
		return true;
	}
	else{
		return false;
	}
}
});


