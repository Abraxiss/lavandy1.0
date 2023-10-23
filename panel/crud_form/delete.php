<?php include("./../data/conexion.php"); ?>
<?php 

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$tabla = $_POST['t'];

$query1 = "SHOW KEYS FROM $tabla WHERE Key_name = 'PRIMARY'";
$result1 = mysqli_query($conexion, $query1);

// Obtener el nombre de la columna de índice primario
$indice = '';
while ($row = mysqli_fetch_assoc($result1)) {
    $indice = $row['Column_name'];
    break;  // Tomamos la primera columna de la clave primaria
}


/*---query elimina---*/
$query= "DELETE FROM $tabla WHERE $indice= $id";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);


if (!$result) {
	die('Invalid query: ' . mysqli_error());
	}

	mysqli_close($conexion);
	echo '<script type="text/javascript">
	    window.location.href="./../form_create_read.php?t=' . $tabla . '";
	    </script>';
	exit();
}

?>