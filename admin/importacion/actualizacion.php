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
/*---------------------------------------------------------------------------
Una vez creada las marcas se creara la entidad con los tipos de vehiculos
Selecciona las marcas y origen de valuacion
El resultado se pasa a array para poder iterar el resulset
Si tv y tipo ya estan registrados en la tabla tipos_vehiculos omite el insert de lo contrario lo inserta.
----------------------------------------------------------------------------*/
$res2=mysqli_query($con,"SELECT DISTINCT(v.tv),v.tipo  from valuacion v ORDER BY v.tipo");
while($v2=mysqli_fetch_array($res2))
{
	
	$sql2=$con->prepare("INSERT INTO tipos_vehiculos (tv, tipo)
            SELECT '$v2[0]', '$v2[1]'
                FROM dual
                WHERE NOT EXISTS (SELECT tv,tipo FROM tipos_vehiculos
                                      WHERE tv='$v2[0]' AND tipo='$v2[1]')");
	$sql2->execute();
}
$affected2 = (int) (mysqli_affected_rows($con));
echo"se registraron ",$affected2," nuevos tipo<br>";
/*-----------------------------------------------------------------------------
Una vez creados los registros de las entidades tipos y marcas vamos a generar el registro de los modelos
el proceso se hara de a 500 registros para evitar conflictos con db
*/
$cant=1;
$desde=0;
$hasta=500;
$flag=0;
$contador=0;
for ($i=0; $i < $cant; $i++)
{ 	$flag=0;
 	$consulta="SELECT * FROM valuacion v WHERE v.id>$desde AND v.id<= $hasta";
 	$resultado=mysqli_query($con,$consulta);
 	while ($vec=mysqli_fetch_array($resultado)) {
 		$contador++;
 		$flag=1;
 	}
 	echo "bandera: ", $flag,"<br>";
 	if ($flag==1) 
 	{
 		$cant++;
 		$desde=$desde + 500;
 		$hasta= $hasta + 500;
 	}
 	echo "vuelta ",$i,"<br>";
 	echo $desde,"<br>";
	echo $hasta,"<br>";
}
echo "contador: ",$contador,"<br>";
echo $desde,"<br>";
echo $hasta,"<br>";
?>
</body>
</html>