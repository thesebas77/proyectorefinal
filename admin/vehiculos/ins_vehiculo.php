<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$dni = htmlentities($_POST['dni']);
		$cuil = htmlentities($_POST['cuil']);
		$dom = htmlentities($_POST['dom']);
		$marca = htmlentities($_POST['marca']);
		$modelo = htmlentities($_POST['modelo']);
		$tipo = htmlentities($_POST['tipo']);
		$ano = htmlentities($_POST['ano']);
		$base = htmlentities($_POST['base']);
		$falta = htmlentities($_POST['falta']);


		if ($dni == 0){
			$tipo = 'Juridica';
		}else{
			$tipo = 'Humana';
		}

		$ins = $con -> prepare("INSERT INTO vehiculo VALUES (?,?,?,?,?,?,?,?) ");
		if ($dni == 0){
			$ins -> bind_param('ssssisid',$dom,$marca,$modelo,$tipo,$ano,$falta,$cuil,$base);
		}else{
			$ins -> bind_param('ssssisid',$dom,$marca,$modelo,$tipo,$ano,$falta,$dni,$base);	
		}
		
		$ins -> execute();
		$ins -> close();

		if($ins){
			header('location:../extend/alerta.php?msj=Se ha registrado el vehiculo con exito&c=ve&p=in&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido registrar el vehiculo&c=ve&p=in&t=error');

		}

		
		return false;
	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();

?>