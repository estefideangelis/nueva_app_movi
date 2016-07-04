$('#formulario').submit(function() {
	// recolecta los valores que inserto el usuario
	var datosUsuario = $("#nombreUsuario").val()
	var datosPassword = $("#password").val()
    var homeLoaded = false;

	archivoValidacion = "http://movivet.tk/app/validacionReal.php?jsoncallback=?" 
	 
	$.getJSON( archivoValidacion, { usuario:datosUsuario ,password:datosPassword}) 
	.done(function(respuestaServer) {
		
			

		if(respuestaServer.validacion == "ok"){ 
		$.mobile.changePage("#registrar");// Redirige a esa page automaticamente va una vez*/

			$("#registrar").on("pageshow", function(){ //al mostrarse esa pagina pasa algo.
                    if(homeLoaded == false){
                        
                        $('#tituloBienvenido').append('<span class="lightTitulo gris">Bienvenido</span> <span class="azul"> ' + respuestaServer[0].nombreUsuario +  '</span> <span class="lightTitulo gris">conoce tu</span>'); 
                    
                        homeLoaded = true;
      }
                        
			});
            
                          
                   
                /* Esto guarda en el localstorage */
                var datosLocales = JSON.stringify(respuestaServer);
                localStorage.setItem("datos", datosLocales);
            
                if(navigator.offline){
                    alert("No hay señal");
                }else{
                    alert("Si hay señal");   
                }
            
                /* Esto es para leer y va en otra parte */
                var datosGuardados = localStorage.getItem("datos");
                var datosObjeto = JSON.parse(datosGuardados);
                
            
	}else{

	    alert("datos incorrectos");
	}
	

	})


	return false;


	})
