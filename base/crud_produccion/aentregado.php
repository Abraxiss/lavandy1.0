<?php include('../includes/session.php'); ?>
<?php include("./../../panel/data/conexion.php"); ?>
<?php 

/*---NEW ORDEN---*/

if (isset($_GET['id'])) {
  $ID_ORD=$_GET['id'];
  $ID_SECUENCIA=8;
  $ID_METODO=26;
  $F_INICIO = date("Y-m-d");
  $H_INICIO = date("H:i:s");
  $T_ESTIMADO = 0;
  $OBS_PROCESO = 'Entregado a movilidad';
  $ID_USER = $id_userup;

          $queryh="SELECT ordenes.ID_ORD, ordenes.ID_TIENDA
            FROM ordenes
            WHERE (((ordenes.ID_ORD)='$ID_ORD'));
            ";
          $resulth=mysqli_query($conexion, $queryh);
          $filash=mysqli_fetch_assoc($resulth);
          $TIENDADESTINO = $filash ['ID_TIENDA'];

/// actualisa tabla detallesdeord

  $query = "UPDATE detallesdeord set 
    STADO_LAVADO= 4
/*---FECHA_ENTREGA= NOW()---*/
  WHERE ID_DETALLE=$ID_DETALLE";
  mysqli_query($conexion, $query);

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


/*---create TRASLADO ---*/

    $ID_TIENDA = 9;
    $TIPO_TRASLADO = 3 ;
    $ID_HORARIO = 1;
     $ORIGEN_TDA = 9;
     $DESTINO_TDA = $TIENDADESTINO;
     $OBS_TRASLADO = "Base a tienda ";
     $STATUS_TRAS = 1 ;

$query= "INSERT INTO traslado(

    ID_USER,
    ID_TDA,
    ID_TIPO_TRASLADO,
    ID_HORARIO,
    ID_ORD,
    ORIGEN_TDA,
    DESTINO_TDA,
    OBS_TRASLADO,
    ID_STATUS_TRAS
) VALUES (
    '$ID_USER',
    '$ID_TIENDA',
    '$TIPO_TRASLADO',
    '$ID_HORARIO',
    '$ID_ORD',
    '$ORIGEN_TDA',
    '$DESTINO_TDA',
    '$OBS_TRASLADO',
    '$STATUS_TRAS'
)";

/*---create ---*/
$result = mysqli_query($conexion, $query);





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