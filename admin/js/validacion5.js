$('#dom').change(function(){
	$.post('ajax_validacion_num3.php', {
		dom:$('#dom').val(),

			beforeSend: function(){
				$('.validacion5').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.validacion5').html(respuesta);
		}
	)
});

	


$('.form').keypress(function(e){
	if (e.which == 13){
		return false;
	}
})
