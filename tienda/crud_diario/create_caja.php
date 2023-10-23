<?php include("./../../panel/data/conexion.php"); ?>

<?php 
// DE FORM ordenes_detalle.php BTN caja
if (isset($_POST['id_ord'])) {
$ID_ORD=$_POST['id_ord'];
$ID_USER=$_POST['id_user'];
$ID_TND=$_POST['id_tienda'];
$PRECIO=$_POST['preciototal'];
$TIPOOP=$_POST['id_tipoop'];
$FECHAR=$_POST['fechar'];
$FORMAPAGO=$_POST['forma_pago'];
$IMPORTE=$_POST['importe'];
$SALDO=$_POST['saldo'];

if ($SALDO=="") {
  $SALDOT=-1000;

} else {
  $SALDOT=$SALDO;
}



if ($SALDOT==0) {
   mysqli_close($conexion);  
  ?> 
  <br><br><br><br>
  <div style="border: solid 1px black;">
  <br>
  <center>No se realizaron registros</center> <br>
  <center>El saldo de la orden en igual a S/. 00.00</center>
  <br> 
  </div>
     <meta http-equiv="refresh" 
      content="4;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
  <?php 
} else {

$query="SELECT * FROM forma_pagos
WHERE (((forma_pagos.ID_FP)='$FORMAPAGO'))";
$result=mysqli_query($conexion, $query);
$filas=mysqli_fetch_assoc($result);
$CTA= $filas ['ID_CTA'];

$query3="SELECT * FROM tipo_operacion
WHERE (((tipo_operacion.ID_TIPOOP)='$TIPOOP'))";
$result3=mysqli_query($conexion, $query3);
$filas3=mysqli_fetch_assoc($result3);
$GLOSA= $filas3 ['DESCRIPCION'];

switch ($TIPOOP) {
    case 2:
        /*---DESCUENTO ---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,  CTA_CONTABLE,  DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD',    '$TIPOOP' ,     1, '$GLOSA',    7411, '$IMPORTE',  0,   '$IMPORTE')";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION, CCOSTO,  GLOSA,  CTA_CONTABLE, DEBE,   HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD',    '$TIPOOP' ,    1, '$GLOSA',   12121,    0,  '$IMPORTE', '$IMPORTE'*-1)";
$result = mysqli_query($conexion, $query);

/// actualisa tabla ORDENES
mysqli_close($conexion);
 ?>     
<meta http-equiv="refresh" 
      content="0;url=../crud_ordenes/update_importes.php?id=<?php echo $ID_ORD ?>" />
<?php 

        break;
    case 3:
        /*---ANTICIPO ---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA, CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD', '$TIPOOP' ,       1,  '$GLOSA',   '$CTA' , '$IMPORTE',  0,   '$IMPORTE')";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION, CCOSTO,  GLOSA,   CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD','$TIPOOP' ,      1,  '$GLOSA',   12121,  0, '$IMPORTE', '$IMPORTE'*-1)";
$result = mysqli_query($conexion, $query);

/// actualisa tabla ORDENES

mysqli_close($conexion);
 ?>     
<meta http-equiv="refresh" 
      content="0;url=../crud_ordenes/update_importes.php?id=<?php echo $ID_ORD ?>" />
<?php 

        break;
    case 4:
        /*---CALCELACION ---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD','$TIPOOP' ,        1,  '$GLOSA',   '$CTA' , '$IMPORTE',  0,   '$IMPORTE')";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION, CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD', '$TIPOOP' ,      1,  '$GLOSA',   12121,  0, '$IMPORTE', '$IMPORTE'*-1)";
$result = mysqli_query($conexion, $query);

/// actualisa tabla ORDENES
mysqli_close($conexion);
 ?>     
<meta http-equiv="refresh" 
      content="0;url=../crud_ordenes/update_importes.php?id=<?php echo $ID_ORD ?>" />
<?php 

        break;
}

/*---redireccion ---*/

 ?>     
<meta http-equiv="refresh" 
      content="0;url=../crud_ordenes/update_importes.php?id=<?php echo $ID_ORD ?>" />
<?php   
}

}
?>

