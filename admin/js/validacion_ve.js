$('.tipo').change(function(){
	$.post('ajax_validacion_ve.php', {
		id_tipo:$('#tipo').val(),
		id_marca:$('#marca').val(),

			beforeSend: function(){
				$('.valid_ve').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid_ve').html(respuesta);
		}
	)
});




