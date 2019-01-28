<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$dom = htmlentities($_GET['dom']);

	$sel = $con -> prepare("SELECT * FROM vehiculo WHERE dominio = ?");
		$sel -> bind_param('s',$dom);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom,$mar,$mod,$tipo,$ano,$falta,$pro);
		$row = $sel -> num_rows();
		if ($sel -> fetch()){}

	$d = date('d');
	$m = date('n');
	$a = date('Y');
	$fbaja = $d.'/'.$m.'/'.$a;

	$ins = $con -> prepare("INSERT INTO bajavehiculo VALUES (?,?,?,?,?,?,?,?) ");
		$ins -> bind_param('ssssissi',$dom,$mar,$mod,$tipo,$ano,$falta,$fbaja,$pro);
		$ins -> execute();

	if($ins){

	$del = $con -> prepare("DELETE FROM vehiculo WHERE dominio=? ");
	$del -> bind_param('s',$dom);
	$del -> execute();
	
	if($del){

			$del = $con -> prepare("DELETE FROM baseimponible WHERE dom=? ");
			$del -> bind_param('s',$dom);
			$del -> execute();

			$del = $con -> prepare("DELETE FROM cuota WHERE imp=? ");
			$del -> bind_param('s',$dom);
			$del -> execute();

			$del = $con -> prepare("DELETE FROM impuesto WHERE dom=? ");
			$del -> bind_param('s',$dom);
			$del -> execute();

			header('location:../extend/alerta.php?msj=El vehiculo ha sido eliminado y se ha registrado en bajas de vehiculos&c=ve&p=liv&t=success');
		}else{
			header('location:../extend/alerta.php?msj=El vehiculo no ha podido ser eliminado&c=ve&p=liv&t=error');
		}
	}else{
		header('location:../extend/alerta.php?msj=El vehiculo no ha podido ser eliminado&c=ve&p=liv&t=error');
	}

	$sel -> close();
	$ins -> close();
	$del -> close();
	$con -> close();
 ?>