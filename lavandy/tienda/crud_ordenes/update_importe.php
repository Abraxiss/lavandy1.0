<?php include("./../../panel/data/conexion.php"); ?>


<?php

if (isset($_POST['id_ord'])) {
  
$ID_ORD=$_POST['id_ord'];
$ID_USER=$_POST['id_user'];

$ID_TIENDA=$_POST['id_tienda'];

$PRECIO=$_POST['precio'];
$TOTAL_DESCUENTO=$_POST['total_descuento'];

$ACTA=$_POST['acta'];
$FORMA_PAGO=$_POST['forma_pago'];

$TOTAL_VTA= $PRECIO - $TOTAL_DESCUENTO;

/// actualisa tabla

  $query = "UPDATE ordenes set 

  ID_USER= '$ID_USER',
  ID_TIENDA= '$ID_TIENDA',
  TOTAL_DESCUENTO= '$TOTAL_DESCUENTO',
  TOTAL_VTA= '$TOTAL_VTA',
  ACTA= '$ACTA',
  SALDO= '$PRECIO' - '$TOTAL_DESCUENTO' - '$ACTA',
  FORMA_PAGO= '$FORMA_PAGO'

  WHERE ID_ORD=$ID_ORD";

  mysqli_query($conexion, $query);




mysqli_close($conexion);
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 

exit();
die();

}

?>