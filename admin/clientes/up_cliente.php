<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$nume = htmlentities($_POST['nume']);
		$dni = htmlentities($_POST['dni']);
		$cuil = htmlentities($_POST['cuil']);
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);
		$dire = htmlentities($_POST['dire']);
		$ciu = htmlentities($_POST['ciu']);

		if ($dni == 0){
			$tipo = 'Juridica';
		}else{
			$tipo = 'Humana';
		}


		$ins = $con -> prepare("UPDATE propietario SET num=?, tipo=?, nom=?, ape=?, domicilio=?, localidad=? WHERE num = ?");
		if ($dni == 0){
			$ins -> bind_param('isssssi',$cuil,$tipo,$nom,$ape,$dire,$ciu,$nume);
		}else{
			$ins -> bind_param('isssssi',$dni,$tipo,$nom,$ape,$dire,$ciu,$nume);	
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