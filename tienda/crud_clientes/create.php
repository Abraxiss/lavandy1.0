<meta charset="UTF-8">

<?php include("./../../panel/data/conexion.php"); ?>

<?php
if (isset($_POST['telefono'])) {
    $TELEFONO = $_POST['telefono'];
    $query = "SELECT * FROM clientes WHERE TELEFONO = '$TELEFONO'";
    $result = mysqli_query($conexion, $query);
    $numfilas = mysqli_num_rows($result);

    if ($numfilas > 0) {


    $mensaje = "El número de teléfono ya está registrado.";
    echo '<script type="text/javascript">
        alert("'.$mensaje.'");
        window.location.href="./../clientes_read.php";
        </script>';
    exit();


    } else {
        // Recopila los datos del formulario
        $NOMBRE = $_POST['n_cliente'];
        $SEXO = $_POST['sexo'];
        $TELEFONO = $_POST['telefono'];
        $ID_TIENDA = $_POST['id_tienda'];
        $RUC_DNI = $_POST['dniruc'];
        $DIRECCION = $_POST['direccion'];
        $LINK_UBICACION = $_POST['link_u'];
        $AROMA_PREFERIDO = $_POST['id_perfume'];
        $CALIFICACION_CLIENTE = $_POST['calificacion'];
        $COMENTARIO_CALIFICACION = $_POST['comentario'];
        $NREFERIDOS = $_POST['referidos'];

        // Realiza la inserción en la base de datos
        $query = "INSERT INTO clientes (
            NOMBRE,
            SEXO,
            ID_TIENDA,
            TELEFONO,
            RUC_DNI,
            DIRECCION,
            LINK_UBICACION,
            AROMA_PREFERIDO,
            CALIFICACION_CLIENTE,
            COMENTARIO_CALIFICACION,
            NREFERIDOS
        ) VALUES (
            '$NOMBRE',
            '$SEXO',
            '$ID_TIENDA',
            '$TELEFONO',
            '$RUC_DNI',
            '$DIRECCION',
            '$LINK_UBICACION',
            '$AROMA_PREFERIDO',
            '$CALIFICACION_CLIENTE',
            '$COMENTARIO_CALIFICACION',
            '$NREFERIDOS'
        )";

        $result = mysqli_query($conexion, $query);
        mysqli_close($conexion);

        echo '<script type="text/javascript">
            window.location.href="./../clientes_read.php";
            </script>';
        exit();
    }
} else {
    mysqli_close($conexion);
    echo '<script type="text/javascript">
        window.location.href="./../clientes_read.php";
        </script>';
    exit();
}
?>

<?php include('./../includes/footer.php'); ?>
