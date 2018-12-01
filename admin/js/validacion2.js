$('#pass0').change(function(){
	$.post('ajax_valid_pass.php', {
		pass0:$('#pass0').val(),

			beforeSend: function(){
				$('.valid').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid').html(respuesta);
		}
	)
});

$('#edit').hide();

$('#pass2').change(function(event){
	if ($('#pass1').val() == $('#pass2').val()){

		swal('Bien hecho..','Las contraseñas coinciden', 'success');
		$('#edit').show();		 	

	}else{

		swal('Uups','Las contraseñas no coinciden', 'error');
		$('#edit').hide();
	}
});

$('.form').keypress(function(e){
	if (e.which == 13){
		return false;
	}
})
