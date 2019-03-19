<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$dom = htmlentities($_POST['dom']);
		$marca = htmlentities($_POST['marca']);
		$modelo = htmlentities($_POST['modelo']);
		$tipo = htmlentities($_POST['tipo']);
		$ano = htmlentities($_POST['ano']);
		$base = htmlentities($_POST['base']);
		$falta = htmlentities($_POST['falta']);


		$ins = $con -> prepare("UPDATE padron SET dominio=?, fechaAlta=?, anioModelo=?, baseImponible=? WHERE dominio = ?");
		$ins -> bind_param('sssds',$falta,$ano,$falta,$base,$dom);
		$ins -> execute();
		$ins -> close();

		if($ins){

			header('location:../extend/alerta.php?msj=Se ha actualizado el vehiculo con exito&c=ve&p=liv&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido actualizar el vehiculo&c=ve&p=liv&t=error');

		}

		
		return false;
	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();

?>