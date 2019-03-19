<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$dom = htmlentities($_GET['dom']);
	$sit = 'Inactivo';

	$sel = $con -> prepare("SELECT p.dominio, p.cod_vehiculo,p.fechaAlta,pro.apellido, pro.email, v.id, v.id_marca, v.id_tipo, v.descripcion, m.marca, tv.tipo, p.baseImponible, p.anioModelo FROM padron as p INNER JOIN persona as pro ON p.propietario = pro.id INNER JOIN vehiculo as v ON p.cod_vehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id WHERE p.dominio = ?");
		$sel -> bind_param('s', $dom);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom,$cod_ve,$falta,$pro,$email,$id_ve,$id_mar,$id_tip,$desc,$marca,$tipo,$monto,$ano);
		$row = $sel -> num_rows();
		if ($sel -> fetch()){}

	$d = date('d');
	$m = date('n');
	$a = date('Y');
	$fbaja = $d.'/'.$m.'/'.$a;

	$ins = $con -> prepare("INSERT INTO bajavehiculo VALUES (?,?,?,?,?,?,?,?) ");
				$ins -> bind_param('ssssisss',$dom,$marca,$desc,$tipo,$ano,$falta,$fbaja,$pro);
				$ins -> execute();

	if($ins){

	$del = $con -> prepare("UPDATE padron SET situacion = ? WHERE dominio=? ");
	$del -> bind_param('ss',$sit,$dom);
	$del -> execute();

			header('location:../extend/alerta.php?msj=El vehiculo ha sido eliminado y se ha registrado en bajas de vehiculos&c=ve&p=liv&t=success');

	}else{
		header('location:../extend/alerta.php?msj=El vehiculo no ha podido ser eliminado&c=ve&p=liv&t=error');
	}

	$sel -> close();
	$ins -> close();
	$del -> close();
	$con -> close();
 ?>