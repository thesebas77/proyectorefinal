$('#cuil').change(function(){
	$.post('ajax_validacion_num.php', {
		cuit:$('#cuit').val(),

			beforeSend: function(){
				$('.valid3').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid3').html(respuesta);
		}
	)
});

	


$('.form').keypress(function(e){
	if (e.which == 13){
		return false;
	}
})
