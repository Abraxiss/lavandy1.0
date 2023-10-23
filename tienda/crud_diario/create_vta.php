<?php include("./../../panel/data/conexion.php"); ?>

<?php 
// DE FORM ordenes_read.php
if (isset($_GET['ido'])) {

$ID_ORD=$_GET['ido'];
$FECHAR=date('Y-m-d');

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

$query="SELECT ordenes.ID_ORD, ordenes.ID_TIENDA, ordenes.ID_USER
FROM ordenes
WHERE (((ordenes.ID_ORD)='$ID_ORD'));
";
$result=mysqli_query($conexion, $query);
$filas=mysqli_fetch_assoc($result);
$ID_TND= $filas ['ID_TIENDA'];
$ID_USER= $filas ['ID_USER'];
/*---PROVICION VENTA---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER', '$ID_TND', '$FECHAR','$ID_ORD',    1 ,        1,     'provision de venta',    1211,      0,      0,      0)";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD',    1 ,        1,     'provision de venta',    70311,      0,      0,      0)";
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