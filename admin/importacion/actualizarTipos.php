<?php 
     include '../extend/header.php';
     include '../extend/permiso.php';


/*---------------------------------------------------------------------------
Una vez creada las marcas se creara la entidad con los tipos de vehiculos
Selecciona las marcas y origen de valuacion
El resultado se pasa a array para poder iterar el resulset
Si tv y tipo ya estan registrados en la tabla tipos_vehiculos omite el insert de lo contrario lo inserta.
----------------------------------------------------------------------------*/
$res2=mysqli_query($con,"SELECT DISTINCT(v.tv),v.tipo  from valuacion v ORDER BY v.tipo");
while($v2=mysqli_fetch_array($res2))
{
	
	$sql2=$con->prepare("INSERT INTO tipo_vehiculos (tv, tipo)
            SELECT '$v2[0]', '$v2[1]'
                FROM dual
                WHERE NOT EXISTS (SELECT tv,tipo FROM tipo_vehiculos
                                      WHERE tv='$v2[0]' AND tipo='$v2[1]')");
	$sql2->execute();
}
$affected2 = (int) (mysqli_affected_rows($con));
echo"se registraron ",$affected2," nuevos tipo<br>";
echo "2do Paso: ";
echo "<a href='actualizarMarcas.php'>Actualizar Marcas de Vehiculos</a><br>";

?>
</body>
</html>