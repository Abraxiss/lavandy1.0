<?php include("./../../panel/data/conexion.php"); ?>

<?php


if (isset($_POST['guardar'])) {

    $ID_TIPO_MSJ = $_POST['id_tipo_msj'];
    $MENSAJE = $_POST['mensaje'];
    $HIPERVINCULO = $_POST['hipervinculo'];
    $ID_USER = $_POST['id_user'];
    $ID_MENSAJE = $_POST['id_mensaje'];
   

/// actualisa tabla

  $query = "UPDATE mensajes set

  ID_TIPO_MSJ = '$ID_TIPO_MSJ',
  MENSAJE = '$MENSAJE',
  HIPERVINCULO = '$HIPERVINCULO',
  ID_USER = '$ID_USER'

  WHERE ID_MENSAJE=$ID_MENSAJE";

  mysqli_query($conexion, $query);



}


mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../mensajes_read.php";
    </script>';
exit();

?>