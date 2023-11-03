<?php include('../includes/session.php'); ?>
<?php include("./../../panel/data/conexion.php"); ?>
<?php 

/*---NEW ORDEN---*/

if (isset($_POST['id'])) {
  $ID_PROCESO=$_POST['idPROCESO'];  
  $ID_DETALLE=$_POST['id'];
  $ID_ORD=$_POST['id_ord'];
  $ID_SECUENCIA=$_POST['secuencia'];
  $ID_METODO=$_POST['metodo'];
  $F_INICIO = $_POST['fecha_inicio'];
  $H_INICIO = $_POST['hora_inicio'];
  $T_ESTIMADO =$_POST['minutos'];
  $OBS_PROCESO =$_POST['obs'];
  $ID_USER = $_POST['id_user'];

/// actualisa tabla

  $query = "UPDATE procesos set 

  ID_ORD=    '$ID_ORD',
ID_ORD_DTLL=    '$ID_DETALLE',
ID_SECUENCIA=    '$ID_SECUENCIA',
ID_METODO=    '$ID_METODO',
F_INICIO=    '$F_INICIO',
H_INICIO=    '$H_INICIO',
T_ESTIMADO=    '$T_ESTIMADO',
OBS_PROCESO=    '$OBS_PROCESO',
ID_USER=    '$ID_USER'


  WHERE ID_PROCESO=$ID_PROCESO";

  mysqli_query($conexion, $query);

mysqli_close($conexion);
/*---redireccion ---*/
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../procesos_create.php?id=<?php echo $ID_DETALLE ?>&io=<?php echo $ID_ORD ?>&ip=<?php echo $ID_PROCESO ?>" />
      
<?php

}

/*---redireccion ---*/
 
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../procesos_create.php?id=<?php echo $ID_DETALLE ?>&io=<?php echo $ID_ORD ?>&ip=<?php echo $ID_PROCESO ?>" />
      
<?php

?>