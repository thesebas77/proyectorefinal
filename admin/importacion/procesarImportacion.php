<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php 
include '../conexion/conexion.php';

$csv = $_FILES['archivo']['name'];

<<<<<<< HEAD
$xlsx = $_FILES['archivo'];
$file = new SimpleXLSX( $xlsx );
$truncate = $con->prepare("truncate table valuacion");
=======
if(file_exists($csv)){

   $fp=fopen($csv, r);
}

/*$truncate=$con->prepare("truncate table valuacion");
>>>>>>> 5e97fcc64e3b380de1aabcebd0e02c764bb86ee6
$truncate->execute();
if($truncate)
{echo"borro";}
*/
$consulta = $con->prepare( "INSERT INTO valuacion (origen,cod_fabrica , cod_marca, cod_tipo,cod_modelo,tv,marca,descripcion,tipo,val_okm,val_1,val_2,val_3,val_4,val_5,val_6,val_7,val_8,val_9,val_10,val_11,val_12,val_13,val_14,val_15,val_16,val_17,val_18,val_19,val_20,val_21,val_22,val_23,val_24) VALUES (?, ?, ?, ?)");
$consulta->bind_Param('sisisssssiiiiiiiiiiiiiiiiiiiiiiiii', $origen,$cod_fabrica, $cod_marca, $cod_tipo, $cod_modelo, $tv, $marca,$descripcion, $tipo, $val_okm, $val_1, $val_2, $val_3, $val_4, $val_5, $val_6, $val_7, $val_8, $val_9, $val_10, $val_11, $val_12, $val_13, $val_14, $val_15, $val_16, $val_17, $val_18, $val_19, $val_20, $val_21, $val_22, $val_23, $val_24);

while($datos= fgetcsv($fp, 0,";"))
{
   $origen= $datos[0];
   $cod_fabrica= $datos[1];
   $cod_marca= $datos[2];
   $cod_tipo= $datos[3];
   $cod_modelo=$datos[4];
   $tv= $datos[5];
   $marca= $datos[6];
   $descripcion= $datos[7];
   $tipo= $datos[8];
   $val_okm= $datos[9];
   $val_1= $datos[10];
   $val_2= $datos[11];
   $val_3= $datos[12];
   $val_4= $datos[13];
   $val_5= $datos[14];
   $val_6= $datos[15];
   $val_7= $datos[16];
   $val_8= $datos[17];
   $val_9= $datos[18];
   $val_10= $datos[19];
   $val_11= $datos[20];
   $val_12= $datos[21];
   $val_13= $datos[22];
   $val_14= $datos[23];
   $val_15= $datos[24];
   $val_16= $datos[25];
   $val_17= $datos[26];
   $val_18= $datos[27];
   $val_19= $datos[28];
   $val_20= $datos[29];
   $val_21= $datos[30];
   $val_22= $datos[31];
   $val_23= $datos[32];
   $val_24= $datos[33];
   $consulta->execute();
}
?>
</body>
</html>