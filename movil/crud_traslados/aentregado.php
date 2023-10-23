<?php include("./../../panel/data/conexion.php"); ?>

<?php 

/*---NEW ORDEN---*/

if (isset($_GET['id'])) {
$ID_TRASLADO=$_GET['id'];
$ID_ORD=$_GET['ord'];
/// actualisa tabla traslado

  $query = "UPDATE traslado set 
  ID_STATUS_TRAS= 3,
  FECHA_ENTREGA= NOW()
  WHERE ID_TRASLADO=$ID_TRASLADO";
  mysqli_query($conexion, $query);

/// actualisa tabla detalleorden

  $query = "UPDATE detallesdeord set 
  STAD_PROD= 1
  WHERE ID_ORD=$ID_ORD";
  mysqli_query($conexion, $query);


mysqli_close($conexion);
/*---redireccion ---*/
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_read.php?s=2" />
<?php

}

/*---redireccion ---*/
 
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_read.php?s=2" />
<?php

?>