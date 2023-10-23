<?php include("./../../panel/data/conexion.php"); ?>

<?php 
if (isset($_POST['id_tienda'])) {
$ID_TND=$_POST['id_tienda'];
$ID_ORD=0;
$ID_USER=$_POST['id_user'];
$TIPOOP=$_POST['id_tipoop'];
$FECHAR=$_POST['fechar'];
$FORMAPAGO=$_POST['forma_pago'];
$IMPORTE=$_POST['importe'];
$GLOSA=$_POST['glosa'];


$query="SELECT * FROM forma_pagos
WHERE (((forma_pagos.ID_FP)='$FORMAPAGO'))";
$result=mysqli_query($conexion, $query);
$filas=mysqli_fetch_assoc($result);
$CTA= $filas ['ID_CTA'];


switch ($TIPOOP) {
    case 1:
        /*---SALDO INICIAL ---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,  CTA_CONTABLE,  DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD',    7 ,     3, '$GLOSA',    10111, '$IMPORTE',  0,   '$IMPORTE')";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION, CCOSTO,  GLOSA,  CTA_CONTABLE, DEBE,   HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD',    7 ,    3, '$GLOSA',   10211,    0,  '$IMPORTE', '$IMPORTE'*-1)";
$result = mysqli_query($conexion, $query);


        break;
    case 2:
        /*---INGRESOS DIVERSOS---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA, CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND', '$FECHAR','$ID_ORD', 8 ,       1,  '$GLOSA',   $CTA , '$IMPORTE',  0,   '$IMPORTE')";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION, CCOSTO,  GLOSA,   CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND','$FECHAR','$ID_ORD',8 ,      1,  '$GLOSA',   70321,  0, '$IMPORTE', '$IMPORTE'*-1)";
$result = mysqli_query($conexion, $query);



        break;
    case 3:
        /*---ENTREGAS A RENDIR ---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND','$FECHAR','$ID_ORD',9 ,        1,  '$GLOSA',   1413 , '$IMPORTE',  0,   '$IMPORTE')";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION, CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND','$FECHAR','$ID_ORD', 9 ,      1,  '$GLOSA',   '$CTA',  0, '$IMPORTE', '$IMPORTE'*-1)";
$result = mysqli_query($conexion, $query);

        break;

    case 4:
        /*---ENTREGA A CAJA CENTRAL ---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND','$FECHAR','$ID_ORD',9 ,        1,  '$GLOSA',   10211 , '$IMPORTE',  0,   '$IMPORTE')";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION, CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND','$FECHAR','$ID_ORD', 9 ,      1,  '$GLOSA',   '$CTA',  0, '$IMPORTE', '$IMPORTE'*-1)";
$result = mysqli_query($conexion, $query);

        break;

    case 5:
        /*---GASTOS DIVERSOS ---*/
$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION,  CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND','$FECHAR','$ID_ORD',9 ,        1,  '$GLOSA',   941 , '$IMPORTE',  0,   '$IMPORTE')";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO 
diario (ID_USER, ID_TDA, FECHA_R, ID_ORD, TIPO_OPERACION, CCOSTO,  GLOSA,       CTA_CONTABLE,    DEBE, HABER, SALDO)
VALUES ('$ID_USER','$ID_TND','$FECHAR','$ID_ORD', 9 ,      1,  '$GLOSA',   '$CTA',  0, '$IMPORTE', '$IMPORTE'*-1)";
$result = mysqli_query($conexion, $query);

        break;

}

}
?>

 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../caja_read.php" />
<?php