<?php include '../extend/header.php';
include '../extend/permiso.php';
include '../conexion/conexion.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
if(isset($_POST["submit"]))
{
	$id = htmlentities($_POST['var']);
	$valor = htmlentities($_POST['valor']);
	$ins = $con -> prepare("UPDATE parametro SET valor= $valor WHERE id= $id");

	$ins -> execute();

	if ($ins) 
	{
		echo"
			<div class='main' id='myDiv'>
				<div class='col s12 m6'>
					<div class='card blue darken-3'>
						<div class='card-content white-text'>
							<span class='card-title'>Operación Exitosa </span>
							</div>
						<div class='card-action'> <a href='#'></a></div>
					</div>
				</div>
			</div> ";
	}
	$ins -> close();



}
?>
</body>
</html>