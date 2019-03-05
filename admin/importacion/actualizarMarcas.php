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

/*---------------------------------------------------------------------------
Selecciona las marcas y origen de valuacion
El resultado se pasa a array para poder iterar el resulset
Si tv y tipo ya estan registrados en la tabla tipos_vehiculos omite el insert de lo contrario lo inserta.
----------------------------------------------------------------------------*/
$res=mysqli_query($con,"SELECT DISTINCT(v.origen),v.marca  from valuacion v ");
while($v=mysqli_fetch_array($res))
{
	$sql=$con->prepare("INSERT INTO marcas (origen, marca)
            SELECT '$v[0]', '$v[1]'
                FROM dual
                WHERE NOT EXISTS (SELECT origen,marca FROM marcas
                                      WHERE origen='$v[0]' and marca='$v[1]')");
	$sql->execute();
}
$affected = (int) (mysqli_affected_rows($con));
echo"se registraron ",$affected," nuevas marcas <br>";
echo "3er Paso: ";
echo "<a href='actualizarVehiculos.php'>Actualizar Modelos de Vehiculos</a><br>";
?>
</body>
</html>

