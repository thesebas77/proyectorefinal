<?php include '../extend/header.php';

	  if ($_SESSION['user'] == ''){
		print "<meta http-equiv=Refresh content=\"1 ; url=../extend/alerta.php?msj=Ingrese con su usuario&c=in2&p=in&t=error\">";
		exit;
	  }
 ?>

				<div class="row center">
					<div class="col s12">
						<div class="card transparent">
							<div class="card-content">
								<span class="card-title">Bienvenido <?php echo $_SESSION['nom']; ?> </span>	
								<p>Desde el menu de inicio va a poder hacer todo lo deseado</p>
							</div>
						</div>
					</div>
					
				</div>



			<?php include '../extend/scripts.php'; ?>
			<?php include '../extend/footer.php'; ?>
		
	</body>
</html>