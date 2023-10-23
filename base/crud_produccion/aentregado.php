<?php include("./../../panel/data/conexion.php"); ?>
<?php include('../includes/session.php'); ?>
<?php 

/*---NEW ORDEN---*/

if (isset($_GET['id'])) {
$ID_DETALLE=$_GET['id'];

/// actualisa tabla

  $query = "UPDATE detallesdeord set 

    STADO_LAVADO= 4
/*---FECHA_ENTREGA= NOW()---*/

  WHERE ID_DETALLE=$ID_DETALLE";

  mysqli_query($conexion, $query);

  $ID_ORD=$_GET['io'];
  $ID_SECUENCIA=8;
  $ID_METODO=26;
  $F_INICIO = date("Y-m-d");
  $H_INICIO = date("H:i:s");
  $T_ESTIMADO = 0;
  $OBS_PROCESO = 'Entregado a movilidad';
  $ID_USER = $id_userup;


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
      content="0;url=./../produccion_read.php?s=3" />
<?php

}

/*---redireccion ---*/
 
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../produccion_read.php?s=3" />
<?php

?>