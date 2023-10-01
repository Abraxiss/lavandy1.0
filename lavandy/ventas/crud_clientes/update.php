<?php include("./../../panel/data/conexion.php"); ?>

<?php


if (isset($_POST['id_user'])) {


    $ID_CLIENTE= $_POST['id_cliente'];
    $NOMBRE = $_POST['n_cliente'];
    $SEXO = $_POST['sexo'];
    $TELEFONO = $_POST['telefono'];
    $TIENDA = $_POST['tienda'];
    $RUC_DNI = $_POST['dniruc'];
    $DIRECCION = $_POST['direccion'];
    $LINK_UBICACION = $_POST['link_u'];
    $PERFUME = $_POST['id_perfume'];
    $CALIFICACION_CLIENTE = $_POST['calificacion'];
    $COMENTARIO_CALIFICACION = $_POST['comentario'];
    $NREFERIDOS = $_POST[ 'referidos'];

/// actualisa tabla

  $query = "UPDATE clientes set

  NOMBRE = '$NOMBRE',
  SEXO = '$SEXO',
  ID_TIENDA = '$TIENDA',
  TELEFONO = '$TELEFONO',
  RUC_DNI = '$RUC_DNI',
  DIRECCION = '$DIRECCION',
  LINK_UBICACION = '$LINK_UBICACION',
  AROMA_PREFERIDO = '$PERFUME',
  CALIFICACION_CLIENTE = '$CALIFICACION_CLIENTE',
  COMENTARIO_CALIFICACION = '$COMENTARIO_CALIFICACION',
  NREFERIDOS = '$NREFERIDOS'

  WHERE ID_CLIENTE=$ID_CLIENTE";

  mysqli_query($conexion, $query);



}


mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../clientes_read.php";
    </script>';
exit();

?>