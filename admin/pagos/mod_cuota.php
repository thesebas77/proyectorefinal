<?php include '../conexion/conexion.php'; 

	$id = htmlentities($_POST['id_cu']);
	$periodo = htmlentities($_POST['periodo']);
	$valor = htmlentities($_POST['valor']);

	$up = $con -> prepare("UPDATE cuota SET valor=? WHERE id = ? ");
		$up -> bind_param('di',$valor,$id);
		$up -> execute();
		$up -> close();

	if($up){

			header('location:../extend/alerta.php?msj=Se ha actualizado la cuota&c=cl&p=lic&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido actualizar la cuota&c=cl&p=lic&t=error');

		}
		$con -> close();
?>