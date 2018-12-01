$('#dni').change(function(){
	$.post('ajax_validacion_num2.php', {
		dni:$('#dni').val(),

			beforeSend: function(){
				$('.valid4').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid4').html(respuesta);
		}
	)
});

	


$('.form').keypress(function(e){
	if (e.which == 13){
		return false;
	}
})
