<meta charset="UTF-8">

<?php include("./../panel/data/conexion.php"); ?>
<?php
if (isset($_POST['orden'])) {
    $ID = $_POST['orden'];
    $query = "SELECT ordenes.ID_ORD, ordenes.N_ORD
              FROM ordenes
              WHERE (ordenes.N_ORD = '$ID')";
    $result = mysqli_query($conexion, $query);
    $numfilas = mysqli_num_rows($result);

    if ($numfilas == 0) {

    $mensaje = "El número de ORDEN no existe.";
    echo '<script type="text/javascript">
        alert("'.$mensaje.'");
        window.location.href="ordenes_read.php";
        </script>';
    exit();

        die();
    } else {
        $filas = mysqli_fetch_assoc($result);
        $ID_ORD = $filas['ID_ORD'];
        ?>
        <meta http-equiv="refresh" content="0;url=ordenes_navega.php?id=<?php echo $ID_ORD; ?>" />
        <?php
    }
} else {
    ?>
    <meta http-equiv="refresh" content="0;url=ordenes_read.php" />
    <?php
}
?>

