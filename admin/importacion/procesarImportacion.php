<?php 
     include '../extend/header.php';
     include '../extend/permiso.php';
              
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<title>Documento sin título</title>
</head>

<body>
<?php 
include '../conexion/conexion.php';

$truncate=$con->prepare("truncate table valuacion");
$truncate->execute();
if($truncate)
{
   echo"<p>Se borro la valuacion anterior y ";
}

$ruta = 'Upload/';
foreach ($_FILES as $key) {

      $nombre=$key["name"];
      $ruta_temporal=$key["tmp_name"];       
      $destino=$ruta.$nombre;
      $explo=explode(".",$nombre);
      move_uploaded_file($ruta_temporal, $destino);
   }
  $sql='LOAD DATA LOCAL INFILE "'.$destino.'" INTO TABLE valuacion FIELDS TERMINATED BY \';\'
   LINES TERMINATED BY \'\n\' (origen,cod_fabrica , cod_marca, cod_tipo,cod_modelo,tv,marca,descripcion,tipo,val_okm,val_1,val_2,val_3,val_4,val_5,val_6,val_7,val_8,val_9,val_10,val_11,val_12,val_13,val_14,val_15,val_16,val_17,val_18,val_19,val_20,val_21,val_22,val_23,val_24)'; 
$res=mysqli_query($con,$sql);
$affected = (int) (mysqli_affected_rows($con));
echo "Se Insertaron ",$affected," nuevos registros</p>";
echo "<a href='actualizacion.php'>Actualizar Valores a tributar</a>";
?>
</body>
</html>