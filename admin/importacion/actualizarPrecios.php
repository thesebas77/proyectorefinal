<?php 
     include '../extend/header.php';
     include '../extend/permiso.php';
              
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include'../conexion/conexion.php';
set_time_limit(620);

$sql=mysqli_query($con,"SELECT * FROM valuacion");
while ($vec=mysqli_fetch_array($sql))
{
	$sql2=mysqli_query($con, "SELECT * FROM vehiculos v JOIN marcas m ON m.id=v.id_marca 
		JOIN tipos_vehiculos tv ON tv.id=v.id_tipo");
	while ($vec2=mysqli_fetch_array($sql2)) 
	{
		echo $vec2[3]."string".$vec2[31];
	}
}

?>
</body>
</html>
