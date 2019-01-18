<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$cod = htmlentities($_POST['cod']);
		$num = htmlentities($_POST['num']);
		$dom = htmlentities($_POST['dom']);
		$marca = htmlentities($_POST['marca']);
		$modelo = htmlentities($_POST['modelo']);
		$tipo = htmlentities($_POST['tipo']);
		$ano = htmlentities($_POST['ano']);
		$base = htmlentities($_POST['base']);
		$falta = htmlentities($_POST['falta']);


		$ins = $con -> prepare("UPDATE vehiculo SET dominio=?, marca=?, modelo=?, tipo=?, ano=?, falta=?, propietario=? WHERE dominio = ?");
		$ins -> bind_param('ssssisis',$dom,$marca,$modelo,$tipo,$ano,$falta,$num,$cod);
		$ins -> execute();
		$ins -> close();

		if($ins){

			$ins = $con -> prepare("UPDATE baseimponible SET valor=? WHERE dom = ?");
			$ins -> bind_param('ds',$base,$cod);
			$ins -> execute();
			$ins -> close();

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