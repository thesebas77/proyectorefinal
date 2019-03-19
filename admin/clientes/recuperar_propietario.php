<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$id = htmlentities($_GET['id']);
	$sit = 'Regular';
	$d = date('d');
			$m = date('n');
			$a = date('Y');
			$fbaja = $d.'/'.$m.'/'.$a;

	$up = $con -> prepare("UPDATE persona SET estado = ? WHERE id = ?");
				$up -> bind_param('si',$sit,$id);
				$up -> execute();

	if($up){
			$valor="ESTADO: Regular";
			$log= mysqli_query($con,"INSERT INTO auditoria (accion,tabla,id_registro,valor,fecha,usuario_id)
	        VALUES('UPDATE','persona',$num,'$valor','$fbaja','$usuario')");
			header('location:../extend/alerta.php?msj=El propietario ha sido recuperado&c=cl&p=lic&t=success');
		}else{
			header('location:../extend/alerta.php?msj=El propietario no ha podido ser recuperado&c=cl&p=lic&t=error');
		}

	$up -> close();
	$con -> close();
 ?>