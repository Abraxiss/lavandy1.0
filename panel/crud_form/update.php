<?php include("./../data/conexion.php"); ?>

<?php
if (isset($_POST['tabla'])) {
    $id = $_POST['id'];
    $tabla = $_POST['tabla'];

    // Obtener la estructura de la tabla
    $query = "DESCRIBE $tabla";
    $result = mysqli_query($conexion, $query);

    // Obtener el nombre de la columna de índice primario
    $indice = '';
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Key'] == 'PRI') {
            $indice = $row['Field'];
            break;  // Tomamos la primera columna de la clave primaria
        }
    }

    // Construir la parte SET de la consulta UPDATE
    $set_values = '';
    $columns = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $campo = $row['Field'];
        if ($campo !== $indice) {
            $valor = isset($_POST[$campo]) ? mysqli_real_escape_string($conexion, $_POST[$campo]) : NULL;
            $set_values .= "$campo = '$valor', ";
        }
    }
    $set_values = rtrim($set_values, ', ');

    // Crear la consulta para actualizar la tabla
    $query = "UPDATE $tabla SET $set_values WHERE $indice = '$id'";

    // Actualizar la tabla
    mysqli_query($conexion, $query);

    mysqli_close($conexion);

    echo '<script type="text/javascript">
            window.location.href="./../form_create_read.php?t=' . $tabla . '";
          </script>';

    exit();
}
?>
