<?php include("./../../panel/data/conexion.php"); ?>

<?php 

/*---NEW ORDEN---*/

if (isset($_GET['id'])) {
$ID_TRASLADO=$_GET['id'];

/// actualisa tabla

  $query = "UPDATE traslado set 

  STATUS_TRAS= 3,
  ANULADO= 'si'

  WHERE ID_TRASLADO=$ID_TRASLADO";

  mysqli_query($conexion, $query);


mysqli_close($conexion);
/*---redireccion ---*/
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_update.php?id=<?php echo $ID_TRASLADO ?>" />
<?php

}

/*---redireccion ---*/
 
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_update.php?id=<?php echo $ID_TRASLADO ?>" />
<?php

?>