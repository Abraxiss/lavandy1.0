<?php include("./../../panel/data/conexion.php"); ?>

<?php


if (isset($_POST['id_user'])) {

    $ID_TRAS=$_POST['id_tras'];
    $ID_USER=$_POST['id_user'];
    $ID_TDA=$_POST['id_tienda_o'];
    $ID_TIPO_TRASLADO = $_POST['tipo_traslado']; 
    $ID_HORARIO = $_POST['horarios_movil'];
    $ID_ORD = $_POST['id_ord'];
    $ORIGEN_TDA = $_POST['id_tienda_o'];
    $DESTINO_TDA = $_POST['id_tienda_d'];
    $OBS_TRASLADO = $_POST['obs_traslado'];


/// actualisa tabla

  $query = "UPDATE traslado set
  
        ID_USER = '$ID_USER',
        ID_TDA = '$ID_TDA',
        ID_TIPO_TRASLADO = '$ID_TIPO_TRASLADO',
        ID_HORARIO = '$ID_HORARIO',
        ID_ORD = '$ID_ORD',
        ORIGEN_TDA = '$ORIGEN_TDA',
        DESTINO_TDA = '$DESTINO_TDA',
        OBS_TRASLADO = '$OBS_TRASLADO'
        WHERE ID_TRASLADO = $ID_TRAS";

  mysqli_query($conexion, $query);



}


mysqli_close($conexion);
/*---redireccion ---*/
 
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_update.php?id=<?php echo $ID_TRAS ?>" />
<?php

exit();

?>