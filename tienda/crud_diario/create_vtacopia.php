<?php include("./../../panel/data/conexion.php"); ?>
eeeeee
<?php 
/*---NEW ARTICULOS---*/


if (isset($_POST['id_ord'])) {

$ID_ORD = mysqli_real_escape_string($conexion, $_POST['id_ord']);

$queryD="SELECT diario.ID_DIARIO, diario.ID_ORD, diario.TIPO_OPERACION
        FROM diario
        WHERE (((diario.ID_ORD)='$ID_ORD') AND ((diario.TIPO_OPERACION)=1))";
        $resultD=mysqli_query($conexion, $queryD);
        $numfilas = mysqli_num_rows($resultD);
 

if ($numfilas>0) {

echo 'ACTUALIZA TABLA DIARIO' ;

} else {

$queryCT="SELECT ordenes.ID_ORD, forma_pagos.ID_CTA
FROM ordenes INNER JOIN forma_pagos ON ordenes.FORMA_PAGO = forma_pagos.ID_FP
WHERE (((ordenes.ID_ORD)='$ID_ORD'));";
$resultCT=mysqli_query($conexion, $queryCT);
$filasCT=mysqli_fetch_assoc($resultCT);
$cuenta = $filasCT ['ID_CTA'];


/*---PROVICION VENTA---*/
$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    1 ,        1,     'provision de venta',    1211,      0,      0,      0)";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    1 ,        1,     'provision de venta',    7011,      0,      0,      0)";
$result = mysqli_query($conexion, $query);


/*---DESCUENTO ---*/
$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    2 ,        1,     'Descuento otorgado',    7011,      0,      0,      0)";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    2 ,        1,     'Descuento otorgado',    1211,      0,      0,      0)";
$result = mysqli_query($conexion, $query);



/*---ADELANDO---*/
$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    3 ,        1,     'anticipo recibido',    '$cuenta',      0,      0,      0)";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    3 ,        1,     'anticipo recibido',    1211,      0,      0,      0)";
$result = mysqli_query($conexion, $query);


/*---CANCELACION ---*/
$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    4 ,        1,     'Cancelacion de venta',    '$cuenta',      0,      0,      0)";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    4 ,        1,     'Cancelacion de venta',    1211,      0,      0,      0)";
$result = mysqli_query($conexion, $query);


/*---redireccion ---*/
mysqli_close($conexion);
 ?>     
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 

};

 ?>     
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 

}

?>