<?php include '../conexion/conexion.php'; 

	$imp = htmlentities($_GET['imp']);
	$num = htmlentities($_GET['num']);
	$pa = htmlentities($_GET['pa']);

	if ($pa == 2){
		$va = 1;
	}else{
		$va = 2;
	}

	$up = $con -> prepare("UPDATE cuota SET paga=? WHERE imp = ? AND id = ? AND paga = ?");
		$up -> bind_param('isii',$va,$imp, $num, $pa);
		$up -> execute();
		$up -> close();

	if($up){

			header('location:../extend/alerta.php?msj=Se ha actualizado el pago correctamente&c=cl&p=lic&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido actualizar el pago&c=cl&p=lic&t=error');

		}
		$con -> close();
?>