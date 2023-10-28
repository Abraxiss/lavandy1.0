<?php include("./../../panel/data/conexion.php"); ?>
<?php 

if (isset($_POST['id'])) {
	$ID_ORD = $_POST['id'];
/*---query elimina---*/
$query= "DELETE FROM ordenes WHERE ID_ORD= $ID_ORD";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);

$query= "DELETE FROM detallesdeord WHERE ID_ORD= $ID_ORD";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);

$query= "DELETE FROM diario WHERE ID_ORD= $ID_ORD";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);

$query= "DELETE FROM traslado WHERE ID_ORD= $ID_ORD";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);



if (!$result) {
	die('Invalid query: ' . mysqli_error());
	}

	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../ordenes_read.php";
    </script>';

exit();


}

/*---redireccion ---*/
mysqli_close($conexion);    
echo'<script type="text/javascript">
    window.location.href="./../ordenes_read.php";
    </script>';
?>