<?php include("./../../panel/data/conexion.php"); ?>

<?php 

/*---NEW ARTICULOS---*/

if (isset($_GET['ido'])) {

$ID_ORD=$_GET['ido'];

$queryD="SELECT diario.ID_DIARIO, diario.ID_ORD, diario.TIPO_OPERACION
        FROM diario
        WHERE (((diario.ID_ORD)='$ID_ORD') AND ((diario.TIPO_OPERACION)=1))";
        $resultD=mysqli_query($conexion, $queryD);
        $numfilas = mysqli_num_rows($resultD);
        
if ($numfilas>0) {

    /*---redireccion ---*/
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 


} else {

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
VALUES ('$ID_ORD',    3 ,        1,     'anticipo recibido',    1011,      0,      0,      0)";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    3 ,        1,     'anticipo recibido',    1211,      0,      0,      0)";
$result = mysqli_query($conexion, $query);


/*---CANCELACION ---*/
$query = "INSERT INTO 
diario (ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_ORD',    4 ,        1,     'Cancelacion de venta',    1011,      0,      0,      0)";
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