<?php include("./../../panel/data/conexion.php"); ?>


<?php


if (isset($_POST['id_ord'])) {
  
$ID_ORD=$_POST['id_ord'];
$ID_USER=$_POST['id_user'];
$ID_TIENDA=$_POST['id_tienda'];
$PRECIO=$_POST['precio'];
$TOTAL_DESCUENTO=$_POST['total_descuento'];
$ACTA=$_POST['acta'];
$CANCELACION=$_POST['cancelacion'];
$FECHA_CANCELACION=$_POST['fecha_cancelacion'];
$FORMA_PAGO=$_POST['forma_pago'];
$TOTAL_VTA= $PRECIO - $TOTAL_DESCUENTO;


/// actualisa tabla
// prov vta
  $query = "UPDATE diario set 
  DEBE= '$PRECIO', HABER = 0, SALDO = '$PRECIO'
  WHERE ID_ORD=$ID_ORD and TIPO_OPERACION=1 AND CTA_CONTABLE=1211";
  mysqli_query($conexion, $query);

  $query = "UPDATE diario set 
  DEBE= 0, HABER = '$PRECIO', SALDO = '$PRECIO'*-1
  WHERE ID_ORD=$ID_ORD and TIPO_OPERACION=1 AND CTA_CONTABLE=7011";
  mysqli_query($conexion, $query);

// prov de descuento

  $query = "UPDATE diario set 
  DEBE= '$TOTAL_DESCUENTO', HABER = 0, SALDO = '$TOTAL_DESCUENTO'
  WHERE ID_ORD=$ID_ORD and TIPO_OPERACION=2 AND CTA_CONTABLE=7011";
  mysqli_query($conexion, $query);

  $query = "UPDATE diario set 
  DEBE= 0, HABER = '$TOTAL_DESCUENTO', SALDO = '$TOTAL_DESCUENTO'*-1
  WHERE ID_ORD=$ID_ORD and TIPO_OPERACION=2 AND CTA_CONTABLE=1211";
  mysqli_query($conexion, $query);

// prov de a cta
  
  $query = "UPDATE diario set 
  DEBE= '$ACTA', HABER = 0, SALDO = '$ACTA'
  WHERE ID_ORD=$ID_ORD and TIPO_OPERACION=3 AND CTA_CONTABLE=1011";
  mysqli_query($conexion, $query);

  $query = "UPDATE diario set 
  DEBE= 0, HABER = '$ACTA', SALDO = '$ACTA'*-1
  WHERE ID_ORD=$ID_ORD and TIPO_OPERACION=3 AND CTA_CONTABLE=1211";
  mysqli_query($conexion, $query);

// prov de cancelacion
  
  $query = "UPDATE diario set 
  DEBE= '$CANCELACION', HABER = 0, SALDO = '$CANCELACION', FECHA_OP = '$FECHA_CANCELACION' 
  WHERE ID_ORD=$ID_ORD and TIPO_OPERACION=4 AND CTA_CONTABLE=1011";
  mysqli_query($conexion, $query);

  $query = "UPDATE diario set 
  DEBE= 0, HABER = '$CANCELACION', SALDO = '$CANCELACION'*-1 , FECHA_OP = '$FECHA_CANCELACION' 
  WHERE ID_ORD=$ID_ORD and TIPO_OPERACION=4 AND CTA_CONTABLE=1211";
  mysqli_query($conexion, $query);

/// actualisa tabla ordenes importes

  $query = "UPDATE ordenes set 

  ID_USER= '$ID_USER',
  ID_TIENDA= '$ID_TIENDA',
  TOTAL_DESCUENTO= '$TOTAL_DESCUENTO',
  TOTAL_VTA= '$TOTAL_VTA',
  ACTA= '$ACTA',
  CANCELACION= '$CANCELACION',
  SALDO= '$PRECIO' - '$TOTAL_DESCUENTO' - '$ACTA' - '$CANCELACION',
  FORMA_PAGO= '$FORMA_PAGO'

  WHERE ID_ORD=$ID_ORD";

  mysqli_query($conexion, $query);



mysqli_close($conexion);
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 

exit();

}

?>