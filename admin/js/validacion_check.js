$('#nacional').change(function(){
	$.post('ajax_validacion_na.php', {

			beforeSend: function(){
				$('.valid_na').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid_na').html(respuesta);
		}
	)
});


$('#importado').change(function(){
	$.post('ajax_validacion_imp.php', {

			beforeSend: function(){
				$('.valid_imp').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid_imp').html(respuesta);
		}
	)
});