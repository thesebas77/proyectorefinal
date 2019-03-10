$('#tipo').change(function(){
	$.post('ajax_validacion_tipo.php', {
		tipo:$('#tipo').val(),
		marca:$('#marca').val(),

			beforeSend: function(){
				$('.valid_tipo').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid_tipo').html(respuesta);
		}
	)
});