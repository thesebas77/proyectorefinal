$('.tipo_i').change(function(){
	$.post('ajax_validacion_vei.php', {
		id_tipo:$('#tipo_i').val(),
		id_marca:$('#marca_i').val(),

			beforeSend: function(){
				$('.valid_vei').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid_vei').html(respuesta);
		}
	)
});