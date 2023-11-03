<?php include("./../../panel/data/conexion.php"); ?>


<?php

if (isset($_POST['id_ord'])) {
  
$ID_ORD=$_POST['id_ord'];
$OBS_ORD=$_POST['obs_ord'];

/// actualisa tabla

  $query = "UPDATE ordenes set 

  OBS_ORD= '$OBS_ORD'

  WHERE ID_ORD=$ID_ORD";

  mysqli_query($conexion, $query);


mysqli_close($conexion);
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../produccion_read.php?s=3" />
<?php 

exit();

}

?>