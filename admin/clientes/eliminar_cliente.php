<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$num = htmlentities($_GET['num']);
	$d = date('d');
			$m = date('n');
			$a = date('Y');
			$fbaja = $d.'/'.$m.'/'.$a;
	$estado = 'Inactivo';
	$usuario=$_SESSION['user'];
	
	$sel = $con -> prepare("SELECT p.dominio, p.cod_vehiculo,p.fechaAlta,pro.apellido, pro.email, v.id, v.id_marca, v.id_tipo, v.descripcion, m.marca, tv.tipo, cu.baseImponible, p.anioModelo FROM padron as p INNER JOIN persona as pro ON p.propietario = pro.id INNER JOIN vehiculo as v ON p.cod_vehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id INNER JOIN cuota as cu ON p.dominio = cu.imp WHERE p.propietario = ?");
		$sel -> bind_param('i', $num);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom,$cod_ve,$falta,$pro,$email,$id_ve,$id_mar,$id_tip,$desc,$marca,$tipo,$monto,$ano);
		$row = $sel -> num_rows();
		
		$valor="$dom  $cod_ve  $falta $pro $email $id_ve $id_mar $id_tip $desc $marca $tipo $monto $ano";
		while ($sel -> fetch()){

			$ins = $con -> prepare("INSERT INTO bajavehiculo VALUES (?,?,?,?,?,?,?,?) ");
				$ins -> bind_param('ssssissi',$dom,$marca,$desc,$tipo,$ano,$falta,$fbaja,$pro);
				$ins -> execute();
			}

	if ($ins){

		$up = $con -> prepare("UPDATE persona SET estado = ? WHERE apellido = ? AND email = ?");
		$up -> bind_param('sss',$estado,$pro,$email);
		$up -> execute();
		$registro=mysqli_query($con,"SELECT bajavehiculo.id FROM bajavehiculo  ORDER BY 1 DESC LIMIT 1");
		while($reg_id=mysqli_fetch_array($registro))
		{	
			$log= mysqli_query($con,"INSERT INTO auditoria (accion,tabla,id_registro,valor,fecha,usuario_id)
			VALUES('INSERT','bajavehiculo',$reg_id[0],'$valor','$fbaja','$usuario')");
		}	

		if($up){
			$valor="ESTADO: Inactivo";
			$log= mysqli_query($con,"INSERT INTO auditoria (accion,tabla,id_registro,valor,fecha,usuario_id)
	        VALUES('UPDATE','persona',$num,'$valor','$fbaja','$usuario')");
				header('location:../extend/alerta.php?msj=El propietario ha sido desactivado, y los vehiculos fueron a baja de vehiculos&c=cl&p=lic&t=success');
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