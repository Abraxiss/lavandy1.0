<?php include('../includes/session.php'); ?>
<?php include("./../../panel/data/conexion.php"); ?>
<?php 

/*---NEW ORDEN---*/

if (isset($_POST['id'])) {
  $ID_DETALLE=$_POST['id'];
  $ID_ORD=$_POST['id_ord'];
  $ID_SECUENCIA=$_POST['secuencia'];
  $ID_METODO=$_POST['metodo'];
  $F_INICIO = $_POST['fecha_inicio'];
  $H_INICIO = $_POST['hora_inicio'];
  $T_ESTIMADO =$_POST['minutos'];
  $OBS_PROCESO =$_POST['obs'];
  $ID_USER = $_POST['id_user'];


if ($ID_SECUENCIA==8) {
    $query = "UPDATE detallesdeord set 

    STADO_LAVADO= 3
/*---FECHA_ENTREGA= NOW()---*/

  WHERE ID_DETALLE=$ID_DETALLE";

  mysqli_query($conexion, $query);
} 


$query1= "INSERT INTO procesos(
ID_ORD,
ID_ORD_DTLL,
ID_SECUENCIA,
ID_METODO,
F_INICIO,
H_INICIO,
T_ESTIMADO,
OBS_PROCESO,
ID_USER

) VALUES (
    '$ID_ORD',
    '$ID_DETALLE',
    '$ID_SECUENCIA',
    '$ID_METODO',
    '$F_INICIO',
    '$H_INICIO',
    '$T_ESTIMADO',
    '$OBS_PROCESO',
    '$ID_USER'
)";

/*---create ---*/
$result = mysqli_query($conexion, $query1);

mysqli_close($conexion);
/*---redireccion ---*/
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