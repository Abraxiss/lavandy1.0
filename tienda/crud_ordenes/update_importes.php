<?php include("./../../panel/data/conexion.php"); ?>


<?php

if (isset($_GET['id'])) {
$ID_ORD=$_GET['id'];

$query1="SELECT detallesdeord.ID_ORD, Sum(detallesdeord.PRECIO_TOTAL) AS SumaDePRECIO_TOTAL
FROM detallesdeord
GROUP BY detallesdeord.ID_ORD
HAVING (((detallesdeord.ID_ORD)='$ID_ORD'));
";
$result1=mysqli_query($conexion, $query1);
$filas1 = mysqli_fetch_assoc($result1);
$numfilas = mysqli_num_rows($result1);

if ($numfilas>0) {
$Provicion_vta = $filas1['SumaDePRECIO_TOTAL'];
} else {
$Provicion_vta = 0;
}


$query2="SELECT diario.ID_ORD, diario.TIPO_OPERACION, Sum(diario.DEBE) AS SumaDeDEBE
FROM diario
GROUP BY diario.ID_ORD, diario.TIPO_OPERACION
HAVING (((diario.ID_ORD)='$ID_ORD'));";
$result2=mysqli_query($conexion, $query2);

$Descuento_vta = 0;
$Anticipo_vta = 0;
$Cancelacion_vta = 0;

if ($result2) {
    while ($filas2 = mysqli_fetch_assoc($result2)) {
        $tipoOperacion = $filas2['TIPO_OPERACION'];
        $debe = $filas2['SumaDeDEBE'];

        if ($tipoOperacion === '2') {
            $Descuento_vta = $debe;
        } elseif ($tipoOperacion === '3') {
            $Anticipo_vta = $debe;
        } elseif ($tipoOperacion === '4') {
            $Cancelacion_vta = $debe;
        }        
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

/// actualisa tabla

  $query = "UPDATE ordenes set 

  PRECIO= '$Provicion_vta',
  TOTAL_DESCUENTO= '$Descuento_vta',
  TOTAL_VTA= '$Provicion_vta' - '$Descuento_vta',
  ACTA= '$Anticipo_vta',
  IGV=0,
  CANCELACION = '$Cancelacion_vta',
  SALDO= '$Provicion_vta' - '$Descuento_vta' - '$Anticipo_vta' - '$Cancelacion_vta' 
  WHERE ID_ORD=$ID_ORD";

  mysqli_query($conexion, $query);


if (isset($_GET['x'])) {
    $X= $_GET['x'];
 ?>     
<meta http-equiv="refresh" 
      content="0;url=../caja_read.php" />
<?php 

} else {
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 

}






exit();


}

?>