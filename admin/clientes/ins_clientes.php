<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$dni = htmlentities($_POST['dni']);
		$cuit = htmlentities($_POST['cuit']);
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);
		$razon = htmlentities($_POST['razon']);
		$dire = htmlentities($_POST['dire']);
		$ciu = htmlentities($_POST['ciu']);
		$email = htmlentities($_POST['email']);
		$gru= htmlentities($_POST['grupo']);
		$obs = htmlentities($_POST['observacion']);
		$fecha = date('Y-m-d');

		$estado="Regular";
		$usuario=$_SESSION['user'];
	
		if (empty($dni))
		{	
			$tipo = 'Juridica';
			$ins=$con->prepare("INSERT INTO persona (razonSocial,cuit,direccion,email,fechaAlta,localidad,grupo,estado,tipo,observaciones) 
			VALUES ('$razon',$cuit,'$dire','$email','$fecha','$ciu',$gru,'$estado','$tipo','$obs') ");
			$ins -> execute();
			$valor="$razon $cuit $dire $email $ciu  $gru $estado $tipo $obs";
		}
		else{
			$tipo = 'Humana';
			$ins = $con -> prepare("INSERT INTO persona (nombre,apellido,dni,direccion,email,fechaAlta,localidad,grupo,estado,tipo,observaciones)
			 VALUES ('$nom','$ape',$dni,'$dire','$email','$fecha','$ciu',$gru,'$estado','$tipo','$obs') ");
			 $ins -> execute();
			 
			$valor="$nom $ape $dni $dire $email $ciu $tipo $gru $estado $obs";
		}


		if($ins){
			$registro=mysqli_query($con,"SELECT persona.id FROM persona  ORDER BY 1 DESC LIMIT 1");
			while($reg_id=mysqli_fetch_array($registro))
			{	
				$log= mysqli_query($con,"INSERT INTO auditoria (accion,tabla,id_registro,valor,fecha,usuario_id)
				VALUES('INSERT','Persona',$reg_id[0],'$valor','$fecha','$usuario')");
			}
			
			header('location:../extend/alerta.php?msj=Se ha registrado el propietario con exito&c=cl&p=in&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}
		else{

			header('location:../extend/alerta.php?msj=No se ha podido registrar el propietario&c=cl&p=in&t=error');

		}

		
		return false;
	}
else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}


?>