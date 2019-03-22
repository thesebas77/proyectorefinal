<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$cod = htmlentities($_POST['codigo']);
		$dom = htmlentities($_POST['dom']);
		$ano = htmlentities($_POST['anomodelo']);
		$persona = htmlentities($_POST['persona']);
		


		$ins = $con -> prepare("UPDATE padron SET dominio=?, propietario=?, anioModelo=? WHERE dominio = ?");
		$ins -> bind_param('siii',$dom,$persona,$ano,$cod);
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