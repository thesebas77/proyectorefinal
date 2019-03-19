<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$dom = htmlentities($_GET['dom']);
	$sit = 'Activo';

	$up = $con -> prepare("UPDATE padron SET situacion = ? WHERE dominio = ?");
				$up -> bind_param('ss',$sit,$dom);
				$up -> execute();

	if($up){

	$del = $con -> prepare("DELETE FROM bajavehiculo WHERE dominio=? ");
			$del -> bind_param('s',$dom);
			$del -> execute();
	
	if($del){
			

			header('location:../extend/alerta.php?msj=El vehiculo ha sido recuperado y se ha eliminado de bajas de vehiculos&c=ve&p=liv&t=success');
		}else{
			header('location:../extend/alerta.php?msj=El vehiculo no ha podido ser recuperado&c=ve&p=liv&t=error');
		}
	}else{
		header('location:../extend/alerta.php?msj=El vehiculo no ha podido ser recuperado&c=ve&p=liv&t=error');
	}

	$up -> close();
	$del -> close();
	$con -> close();
 ?>