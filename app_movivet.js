// JavaScript Document
/*
function guardar()
{
	localStorage.setItem("nombre","Pepe");
}

function ver()
{
	alert(localStorage.getItem("nombre"));
}

function saludo()
{
	alert("Hola!");
}

$("#saludo").click(saludo);


window.addEventListener("online", hay);
window.addEventListener("offline", nohay);


function hay()
{
	alert("hay internet");
	}
	
	function nohay()
{
	alert("no hay internet");
	}
	
if(navigator.offline)
{
	alert("no hay señal");
}else{
	alert("hay señal");
}

$("#boton").click(guardar);
$("#botonver").click(ver);
*/
$(document).ready(function(){
    
	//$("#disponible").empty();
		
	$.getJSON("http://movivet.tk/webservice_movivet.php", function(resultados){
            
			for(var i=0;i<resultados.length;i++){
			$.each(resultados[i], function(i, campo){
                $("#disponible").append(campo);
            });
			}
        });
		
	/*	
	$("#submit_disp").click(function(){
        $.getJSON("http://localhost/json/reservar.php", function(resultados){
            for(var i=0;i<resultado.length;i++){
			$.each(resultados[i], function(i, campo){
                $("#lista").append("<p>"+campo+"</p>");
            });
			}
        });
    });*/
	$('#form_reserva').submit(function(evento){
		evento.preventDefault();	
		localStorage.setItem("muestraFecha", $('#input_fecha').val());
		localStorage.setItem("muestraHora", $('#input_hora').val());
			$.ajax({ 
				url: 'http://movivet.tk/webservice_movivet.php',
				data: {
					turnos:$('#input_fecha').val(),
					turnos:$('#input_hora').val(),
				},
				type: 'post',
				success: function(output) {
					
					alert(output);
	
				}
			});		
	});
	
		
	
	/*$('#form_reserva').submit(function(evento){
	
	evento.preventDefault();
	var personas_reserva= $('#input_personas').val();
	var fecha_reserva= $('#input_fecha').val();
	
	var enviar_reserva="http://localhost/Pizza/reservar.php?jsoncallback=?";
	
	$.getJSON(enviar_reserva, {mesas: personas_reserva}).done(function(respuestaServer){
			console.log(respuestaServer);
			alert("Hola!");
			$.each(respuestaServer, function(i, campo){
                
				alert(campo.feedback);
				//$( ":mobile-pagecontainer" ).pagecontainer( "change", "index.html", { role: "dialog" } );			
            });
			
		})
}
)*/

$("#verReserva").click(ver);
	function ver()
{
	 var myWindow = window.open("", "MsgWindow", "width=300,height=100");
    myWindow.document.write(" Has reservado un turno para el dia: "+localStorage.getItem("muestraFecha")+"</br>"+" En el horario de las: "+localStorage.getItem("muestraHora"));

	

}


});
