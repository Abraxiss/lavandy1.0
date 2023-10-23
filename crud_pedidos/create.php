<?php include("./../panel/data/conexion.php"); ?>

<?php 

if (isset($_POST['guardar'])) {
	
	
	
	 $c3 = $_POST['id_cliente'];
	 $c4 = $_POST['cl_nombre'];
	 $c5 = $_POST['id_articulo'];
	
	$c7 = $_POST['pd_cantidad'];
	$c8 = $_POST['pd_telefono'];
	$c9 = $_POST['pd_ubicacion'];
	
/*---KKIK---*/
$query= "INSERT INTO pedidos(  
  
id_cliente,
cl_nombre,
id_articulo,

pd_cantidad,
pd_telefono,
pd_ubicacion
) VALUES (

'$c3',
'$c4',
'$c5',

'$c7', 
'$c8',
'$c9'
)";

/*---create ---*/
$result = mysqli_query($conexion, $query);


if (!$result) {
	die('Invalid query: ' . mysqli_error());
	}

/*---redireccion ---*/	
mysqli_close($conexion);	

echo'<script type="text/javascript">
    window.location.href="./../okpedido.php";
    </script>';
exit();
die();

}

?>