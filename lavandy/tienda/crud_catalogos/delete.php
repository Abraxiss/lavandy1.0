<?php include("./../data/conexion.php"); ?>
<?php 

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo "$id";
/*---query elimina---*/
$query= "DELETE FROM catalogos WHERE id_catalogo= $id";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);

if (!$result) {
	die('Invalid query: ' . mysqli_error());
	}

mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../catalogos-create-read.php";
    </script>';

exit();
die();

}

?>