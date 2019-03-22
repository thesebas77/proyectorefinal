<?php include '../extend/header.php'; 




?>

	<br>
	<div class="row">
		<div class="col s3 m3 l3 xl3"></div>

					<div class="col s6 m6 l6 xl6">
						<div class="card center">
							
								<div class="card-content">
									<span class="card-title">Recaudacion</span>	
								 	
								 	<button style="width: 100%;" onclick="enviar();" class="btn waves-effect waves-light" id="btn_buscar"><i class="material-icons">search</i>
									</button>

				</div>
			<div class="col s3 m3 l3 xl3"></div>

			</div>
		</div>
	</div>

	<div class="valid">
		
	</div>
	
	<script>

	function enviar(){
	$.get('ajax_teclado.php', {

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