<?php include('../includes/session.php'); ?>
<?php include("./../../panel/data/conexion.php"); ?>
<?php 

/*---NEW ORDEN---*/

if (isset($_GET['id'])) {
$ID_ORD=$_GET['id'];

/// actualisa tabla

  $query = "UPDATE ordenes set 

    STATUS_LAVADO= 3
/*---FECHA_ENTREGA= NOW()---*/

  WHERE ID_ORD=$ID_ORD";

  mysqli_query($conexion, $query);

?>   
<meta http-equiv="refresh" 
      content="0;url=./../produccion_read.php?s=2" />
<?php

}

/*---redireccion ---*/
 
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../produccion_read.php?s=2" />
<?php

?>