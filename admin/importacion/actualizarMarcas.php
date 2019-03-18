<?php
include '../extend/header.php';
     include '../extend/permiso.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Tipos</title>
</head>
<body >
<div class="center" id="cargando">
		 <div class="preloader-wrapper big active">
		    <div class="spinner-layer spinner-blue-only">
		      <div class="circle-clipper left">
		        <div class="circle"></div>
		      </div><div class="gap-patch">
		        <div class="circle"></div>
		      </div><div class="circle-clipper right">
		        <div class="circle"></div>
		      </div>
    </div>
  </div>
	</div>
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
	$sql=$con->prepare("INSERT INTO marca (origen, marcas)
            SELECT '$v[0]', '$v[1]'
                FROM dual
                WHERE NOT EXISTS (SELECT origen,marcas FROM marca
                                      WHERE origen='$v[0]' and marcas='$v[1]')");
	$sql->execute();
}
$affected = (int) (mysqli_affected_rows($con));
echo"
	<div class=main' id='myDiv'>
		<div class='col s12 m6'>
			<div class='card blue darken-3'>
				<div class='card-content white-text'>
					<span class='card-title'>Operación Exitosa </span>
						<p>Se registraron ",$affected," nuevas marcas.</p>
						<p>El Proceso de actualizacion de datos puede demorar varios minutos siga los links hasta finalizar el proceso</p>
					</div>
				<div class='card-action'> <a href='actualizarVehiculos.php' id='link'>Paso 3: Actualizar Modelos de Vehiculos</a></div>
			</div>
		</div>
	</div>";
?>
<?php include '../extend/scripts.php'; ?>
<script>
	window.addEventListener('load',() => {

setTimeout(() => {
	document.getElementById("cargando").className="hide";
	$(.main).show();
}, timeout 1500);

},true);
</script>
</body>
</html>

