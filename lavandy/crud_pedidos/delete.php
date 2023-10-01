<?php include("./../panel/data/conexion.php"); ?>
<?php 

if (isset($_GET['id'])) {
	$id = $_GET['id'];
/*---query elimina---*/
$query= "DELETE FROM pedidos WHERE id_pedido= $id";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);


/*---secion para msj ---*/


/*---redireccion ---*/	
mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../panel/pedidos_read.php";
    </script>';

exit();
die();

}

?>