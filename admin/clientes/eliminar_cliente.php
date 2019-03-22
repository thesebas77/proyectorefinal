<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$num = htmlentities($_GET['num']);
	$fbaja = date('Y/m/d');
	$estado = 'Inactivo';
	$usuario=$_SESSION['user'];
	
	$up = $con -> prepare("UPDATE persona SET estado = ? WHERE id = ?");
		$up -> bind_param('si',$estado,$num);
		$up -> execute();
			
	if ($up){
		
		$sel = $con -> prepare("SELECT p.dominio, p.codVehiculo,p.fechaAlta,pro.apellido, pro.email,pro.id, v.id, v.id_marca, v.id_tipo, v.descripcion, m.marcas, tv.tipo, p.anioModelo FROM padron as p INNER JOIN persona as pro ON p.propietario = pro.id INNER JOIN vehiculo as v ON p.codVehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id WHERE p.propietario = ?");
		$sel -> bind_param('i', $num);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom,$cod_ve,$falta,$pro,$email,$pro_id,$id_ve,$id_mar,$id_tip,$desc,$marca,$tipo,$ano);
		$row = $sel -> num_rows();


		header('location:../extend/alerta.php?msj=El propietario ha sido eliminado&c=cl&p=lic&t=success');
		
		
	}else{
		header('location:../extend/alerta.php?msj=El propietario no ha podido ser eliminado&c=cl&p=lic&t=error');
	}
	
	$up -> close();
	$sel -> close();
	$con -> close();
 ?>