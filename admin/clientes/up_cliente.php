<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['nume'])){$nume = htmlentities($_POST['nume']);}
		if(isset($_POST['dni'])){$dni = htmlentities($_POST['dni']);}
		if(isset($_POST['cuit'])){$cuit = htmlentities($_POST['cuit']);}
		if(isset($_POST['nom'])){$nom = htmlentities($_POST['nom']);}
		if(isset($_POST['ape'])){$ape = htmlentities($_POST['ape']);}
		if(isset($_POST['razon'])){$razon=htmlentities($_POST['razon']);}
		if(isset($_POST['dire'])){$dire = htmlentities($_POST['dire']);}
		if(isset($_POST['email'])){$email = htmlentities($_POST['email']);}
		if(isset($_POST['ciu'])){$ciu = htmlentities($_POST['ciu']);}
		if(isset($_POST['tipo'])){$tipo=htmlentities($_POST['tipo']);}
		if(isset($_POST['grupo'])){$grupo = htmlentities($_POST['grupo']);}
		if(isset($_POST['observacion'])){$obs = htmlentities($_POST['observacion']);}
		$usuario=$_SESSION['user'];
		$d = date('d');
			$m = date('n');
			$a = date('Y');
			$fecha = $d.'/'.$m.'/'.$a;
			
		if (empty($dni)){
			$tipo = 'Juridica';
			$ins = $con -> prepare("UPDATE persona SET  razonSocial=?, cuit=?, direccion=?, email=?, localidad=?, tipo=?,grupo=?,estado=?, observaciones=? WHERE id = ?");
			$ins -> bind_param('sissssissi',$razon,$cuit,$dire,$email,$ciu,$tipo,$gru,$est,$obs,$nume);
			$ins -> execute();
			$valor="$razon $cuit $dire $email $ciu $tipo $gru $estado $obs";
		}else{
			$tipo = 'Humana';
			$ins = $con -> prepare("UPDATE persona SET  nombre=?, apellido=?,  dni=?, direccion=?, email=?, localidad=?, tipo=?,grupo=?,estado=?, observaciones=? WHERE id = ?");
			$ins -> bind_param('ssissssissi',$nom,$ape,$dni,$dire,$email,$ciu,$tipo,$gru,$est,$obs,$nume);
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
			header('location:../extend/alerta.php?msj=Se ha actualizado el propietario con exito&c=cl&p=lic&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido actualizar el propietario&c=cl&p=lic&t=error');
			echo "error";
		}

		
		return false;
	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();

?>