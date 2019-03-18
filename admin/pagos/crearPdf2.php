
<?php include '../conexion/conexion.php';

	$dom = htmlentities($_GET['dom']);
	$num = htmlentities($_GET['num']);

    # Proietario
    $sel = $con -> prepare("SELECT tipo,nombre,apellido,razonSocial,dni,cuit,domicilio,localidad FROM persona WHERE id = ?");
        $sel -> bind_param('i',$num);
        $sel -> execute();
        $sel -> store_result();
        $sel -> bind_result($tipo,$nom,$ape,$razon,$dni,$cuit,$domi,$loca);
        $row = $sel -> num_rows();
        if ($sel -> fetch()){}


    # Vehiculo
    $sel = $con -> prepare("SELECT v.descripcion, m.marca, tv.tipo, p.anioModelo FROM padron as p INNER JOIN vehiculo as v ON p.cod_vehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id  WHERE p.dominio = ?");
        $sel -> bind_param('s', $dom);
        $sel -> execute();
        $sel -> store_result();
        $sel -> bind_result($mod, $mar, $tip, $ano);
        $row = $sel -> num_rows();
        if ($sel -> fetch()){}


    $pag = 2;
    $m = 0;
        # Cuota
    $sel = $con -> prepare('SELECT * FROM cuota WHERE imp = ? AND paga = ?');
            $sel -> bind_param('si', $dom,$pag);
            $sel -> execute();
            $sel -> store_result();
            $sel -> bind_result($id_cuota,$imp, $valor, $fven, $fven2, $paga, $usuario, $fpago);
            $row = $sel -> num_rows();
            
            while ($sel -> fetch()){

                $numc1[$m] = $id_cuota;
                $valor1[$m] = $valor;
                $fven1[$m] = $fven;
                $fven11[$m] = $fven2;

                $m = $m + 1;
             }

ob_start() ?>


 <table style="border-collapse: collapse;" border="1"; width="520"> 

        <tr>
            
            <td  height="18">
                <p align="center">
                 <font size=1>   Boleta - Rentas - Municipalidad de Tolhuin</font>
                </p>
            </td>
            <td  height="18">
                <p align="center">
                   <font size=1> <strong>Cuota</strong>
                </p>
            </td>
            <td  colspan="3"  height="10">
                <p align="center">
                  <font size=1>  Varias
                </p>
            </td>
        </tr>
        <tr>
            <td  height="18">
                <p align="center">
                   <font size=1> <strong>Fecha de vencimiento 1: </strong> Todas las cuotas emitidas
                    <strong></strong>
                </p>
            </td>
            <td  rowspan="2"  height="10">
                <p align="center">
                   <font size=1> <strong>Fecha de emision</strong>
                </p>
            </td>
            <td  colspan="3" rowspan="2"  height="10">
                <p align="center">
                  <font size=1>  <?php echo date('d-n-Y'); ?>
                </p>
            </td>
        </tr>
        <tr>
            <td  height="18">
                <p align="center">
                 <font size=1>  <strong>Fecha de vencimiento 2:</strong> Todas las cuotas emitidas
                </p>
            </td>
        </tr>

    </tbody>
</table>

<br>

<font size=2> 
    <table style="border-collapse: collapse; text-align: justify; margin-left: 4.8pt; margin-right: 4.8pt;" width="515">
<tbody>
<tr style="page-break-inside: avoid; height: 7.0pt;">
<td style="width: 519.25pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.0pt;" colspan="2" width="692">
<p><strong>Nombre del propietario: </strong>
    <?php if (empty($razon)): ?>
    <?php echo $nom; ?> <?php echo $ape; ?>
    <?php else: ?>
    <?php echo $razon; ?>
    <?php endif; ?>
</p>
</td>
</tr>
<tr style="height: 7.4pt;">
<td style="width: 259.65pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.4pt;" width="346">
<p><strong>D.N.I/Cuil:</strong> <?php 
    if (empty($dni)){
        echo $cuit;
    }else{
        echo $dni; 
        
    }
    


    ?> 
</p>
</td>
<td style="width: 259.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.4pt;" width="346">
<p><strong>Domicilio:</strong> <?php echo $domi; ?> </p>
<p><strong>Localidad:</strong> <?php echo $loca; ?>  </p>
</td>
</tr>
<tr style="height: 6.4pt;">
<td style="width: 519.25pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 6.4pt;" colspan="2" width="692">
<p><strong>Dominio:</strong> <?php echo $dom; ?></p>
</td>
</tr>
</tbody>
</table>

<br>

<font size=2> 
    <table style="border-collapse: collapse; text-align: justify; margin-left: 4.8pt; margin-right: 4.8pt;" width="515">
<tbody>
<tr style="height: 7.4pt;">
<td style="width: 259.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.4pt;" width="346">
<p><strong>Marca:</strong> <?php echo $mar; ?> </p>
<p><strong>Modelo:</strong> <?php echo $mod; ?>  </p>
</td>
<td style="width: 259.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.4pt;" width="346">
<p><strong>Tipo:</strong> <?php echo $tip; ?> </p>
<p><strong>Año:</strong> <?php echo $ano; ?>  </p>
</td>
</tr>
<tr style="page-break-inside: avoid; height: 7.0pt;">
<td style="width: 519.25pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.0pt;" colspan="2" width="692">
<br>

<table style="border-collapse: collapse;" border="1"; width="520">

    
	  <tr>
            
            <td  height="10">
                <p align="center">
                 <font size=1> <strong>ID-Cuota</strong></font>
                </p>
            </td>
            <td  height="10">
                <p align="center">
                   <font size=1> <strong>Valor de cuota</strong>
                </p>
            </td>
           
        </tr>
    <?php global $total; ?>
        <?php for ($i = 0; $i < $m; $i++): ?>
        <tr>
            
            <td  height="10">
                <p align="center">
                 <font size=1> <?php echo $numc1[$i]; ?></font>
                </p>
            </td>
            <td  height="10">
                <p align="center">
                   <font size=1> <?php echo $valor1[$i]; ?>
                </p>
            </td>
           
        </tr>

        <?php $total = $total + $valor1[$i]; ?>
    <?php endfor; 

    $res = $total-(($total*10)/100);
    ?>

     <tr>
            
            <td  height="10">
                <p align="center">
                 <font size=1> <strong>Total a pagar:</strong></font>
                </p>
            </td>
            <td  height="10">
                <p align="center">
                   <font size=1> <?php echo $res; ?>
                </p>
            </td>
           
        </tr>
    
</table>
 <p style="text-align: center;">codigo:  </p>
 <p style="text-align: center; font-weight: bold;"><?php echo $num, 15, $dom; ?></p>
 <p style="text-align: center;">Digale al vendedor los numeros </p>

</td>
</tr>

</tbody>
</table>



<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba

 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("latter", "portrait");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html(ob_get_clean());
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('Boleta-'.$num.'.pdf');


function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}

$sel -> close();
$con -> close();
?>
