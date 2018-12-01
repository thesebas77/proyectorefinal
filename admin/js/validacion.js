$('#user').change(function(){
	$.post('ajax_validacion_user.php', {
		user:$('#user').val(),

		beforeSend: function(){
			$('.validacion').html("Espere un momento por favor..")
		}
	}, function(respuesta){
			$('.validacion').html(respuesta);
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
