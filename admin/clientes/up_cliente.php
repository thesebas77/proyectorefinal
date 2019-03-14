<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$nume = htmlentities($_POST['nume']);
		$dni = htmlentities($_POST['dni']);
		$cuit = htmlentities($_POST['cuil']);
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);
		$razon=htmlentities($_POST['ape']);
		$dire = htmlentities($_POST['dire']);
		$email = htmlentities($_POST['email']);
		$ciu = htmlentities($_POST['ciu']);
		$tipo=htmlentities($_POST['email']);
		$grupo = htmlentities($_POST['email']);
		$obs = htmlentities($_POST['observacion']);


		if (empty($dni)){
			$tipo = 'Juridica';
			$ins = $con -> prepare("UPDATE propietario SET  razonSocial=?, cuit=?, domicilio=?, email=?, localidad=?, tipo=?,grupo=?,estado=?, observaciones=? WHERE id = ?");
			$ins -> bind_param('sisssssiss',$razon,$cuit,$razon,$dire,$email,$ciu,$tipo,$gru,$est,$obs,$nume);
		}else{
			$tipo = 'Humana';
			$ins = $con -> prepare("UPDATE propietario SET  nombre=?, apellido=?,  dni=?, domicilio=?, email=?, localidad=?, tipo=?,grupo=?,estado=?, observaciones=? WHERE id = ?");
			$ins -> bind_param('ssissssiss',$nom,$ape,$dni,$dire,$email,$ciu,$tipo,$gru,$est,$obs,$nume);
		}
		
		$ins -> execute();
		$ins -> close();

		if($ins){
			header('location:../extend/alerta.php?msj=Se ha actualizado el propietario con exito&c=cl&p=lic&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido actualizar el propietario&c=cl&p=lic&t=error');

		}

		
		return false;
	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();

?>