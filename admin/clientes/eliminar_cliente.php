<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$num = htmlentities($_GET['num']);
	$d = date('d');
			$m = date('n');
			$a = date('Y');
			$fbaja = $d.'/'.$m.'/'.$a;

	$sel = $con -> prepare("SELECT * FROM padron WHERE propietario = ?");
		$sel -> bind_param('i',$num);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom,$mar,$mod,$tipo,$ano,$falta,$pro);
		$row = $sel -> num_rows();
		while ($sel -> fetch()){

			$ins = $con -> prepare("INSERT INTO bajavehiculo VALUES (?,?,?,?,?,?,?,?) ");
				$ins -> bind_param('ssssissi',$dom,$mar,$mod,$tipo,$ano,$falta,$fbaja,$pro);
				$ins -> execute();
			}

	if ($ins){

		$del = $con -> prepare("DELETE FROM propietario WHERE num=? ");
		$del -> bind_param('i',$num);
		$del -> execute();

		$del = $con -> prepare("DELETE FROM vehiculo WHERE propietario=? ");
		$del -> bind_param('i',$num);
		$del -> execute();
		

		if($del){
				header('location:../extend/alerta.php?msj=El propietario ha sido eliminado, con todos sus vehiculos asociados y los vehiculos fueron a baja de vehiculos&c=cl&p=lic&t=success');
			}else{
				header('location:../extend/alerta.php?msj=El propietario no ha podido ser eliminado&c=cl&p=lic&t=error');
			}	
	}else{
		header('location:../extend/alerta.php?msj=El propietario no ha podido ser eliminado&c=cl&p=lic&t=error');
	}

	

	$ins -> close();
	$del -> close();
	$con -> close();
 ?>