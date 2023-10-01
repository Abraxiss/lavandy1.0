<?php include("./../../panel/data/conexion.php"); ?>


<?php

if (isset($_POST['id_ord'])) {
  
$ID_ORD=$_POST['id_ord'];
$ID_USER=$_POST['id_user'];
$N_ORD=$_POST['n_ord'];
$ID_TIENDA=$_POST['id_tienda'];
$ID_CLIENTE=$_POST['id_cliente'];
$FECHA_INICIO=$_POST['fecha_inicio'];
$HORA_INICIO=$_POST['hora_inicio'];
$FECHA_ENTREGA=$_POST['fecha_entrega'];
$HORA_ENTREGA=$_POST['hora_entrega'];
$ID_LAVADO=$_POST['id_lavado'];
$ID_PERFUME=$_POST['id_perfume'];
$ADOMICILIO=$_POST['adomicilio'];


/// actualisa tabla

  $query = "UPDATE ordenes set 

  ID_USER= '$ID_USER',
  N_ORD= '$N_ORD',
  ID_TIENDA= '$ID_TIENDA',
  ID_CLIENTE= '$ID_CLIENTE',
  FECHA_INICIO= '$FECHA_INICIO',
  HORA_INICIO= '$HORA_INICIO',
  FECHA_ENTREGA= '$FECHA_ENTREGA',
  HORA_ENTREGA= '$HORA_ENTREGA',
  ID_LAVADO= '$ID_LAVADO',
  ID_PERFUME= '$ID_PERFUME',
  ADOMICILIO= '$ADOMICILIO'

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