<?php include("../panel/data/conexion.php"); ?>

<?php


if (isset($_POST['id_cliente'])) {


    $ID_CLIENTE= $_POST['id_cliente'];
    $NOMBRE = $_POST['n_cliente'];
    $SEXO = $_POST['sexo'];
    $TELEFONO = $_POST['telefono'];
    $TIENDA = $_POST['tienda'];
    $RUC_DNI = $_POST['dniruc'];
    $DIRECCION = $_POST['direccion'];
    $PERFUME = $_POST['id_perfume'];
    $NREFERIDOS = $_POST[ 'referidos'];

/// actualisa tabla

  $query = "UPDATE clientes set

  NOMBRE = '$NOMBRE',
  SEXO = '$SEXO',
  ID_TIENDA = '$TIENDA',
  TELEFONO = '$TELEFONO',
  RUC_DNI = '$RUC_DNI',
  DIRECCION = '$DIRECCION',
  AROMA_PREFERIDO = '$PERFUME',
  NREFERIDOS = '$NREFERIDOS'

  WHERE ID_CLIENTE=$ID_CLIENTE";

  mysqli_query($conexion, $query);



}


mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../micuenta.php";
    </script>';
exit();

?>