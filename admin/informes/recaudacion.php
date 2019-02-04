<?php include '../extend/header.php'; 




?>

	<br>
	<div class="row">
		<div class="col s3 m3 l3 xl3"></div>

					<div class="col s6 m6 l6 xl6">
						<div class="card">
							
								<div class="card-content">
									<span class="card-title">Recaudacion</span>	
									<div class="input-field">
										<input type="text" class="datepicker" name="fdes" id="fdes">
										<label for="fdes">Desde:</label>		
									</div>
									<div class="input-field">
										<input type="text" class="datepicker" name="fhas" id="fhas">
										<label for="fhas">Hasta:</label>		
									</div>
								 	
								 	<button style="width: 100%;" onclick="enviar(document.getElementById('fdes').value,document.getElementById('fhas').value);" class="btn waves-effect waves-light" id="btn_buscar"><i class="material-icons">search</i>
									</button>

				</div>
			<div class="col s3 m3 l3 xl3"></div>

			</div>
		</div>
	</div>

	<div class="valid">
		
	</div>
	
	<script>

	function enviar(valor,valor1){
	$.get('ajax_teclado.php', {
		fdes:valor,
		fhas:valor1,

			beforeSend: function(){
				$('.valid').html("Espere un momento..");
			}
		
		}, function(respuesta){
			$('.valid').html(respuesta);
		}
			)
	}
	
	</script>
	
	<?php include '../extend/scripts.php'; ?>


</body>
</html>