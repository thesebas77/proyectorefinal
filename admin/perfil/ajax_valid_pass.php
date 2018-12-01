<?php include '../conexion/conexion.php'; 

	$pass = htmlentities($_POST['pass0']);
	$pass = sha1($pass);

	$sel = $con -> prepare("SELECT id_user FROM usuario WHERE pass = ?");
	$sel -> bind_param('s',$pass);
	$sel -> execute();
	$sel -> bind_result($id_user);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:green'> La contraseña es correcta </label>
			<script> document.getElementById('pass1').disabled=false;
				document.getElementById('pass2').disabled=false;
			</script>
		";
	}else{
		echo "<label style='color:red'> La contraseña no coincide 
			</label>
			<script> document.getElementById('pass1').disabled=true;
				document.getElementById('pass2').disabled=true;
			</script>
			";
	}

	$sel -> close();

	$con -> close();
?>