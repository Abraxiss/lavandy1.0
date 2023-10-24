 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
<?php include("./../panel/data/conexion.php"); ?> 

	
 </head>
 <body>
<?php
if (isset($_POST['guardar'])) {
	
	$fono = $_POST['cl_numero'];
	

$query="SELECT TELEFONO FROM clientes WHERE TELEFONO= '$fono' ";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);


if ($numfilas>0) {

echo'<script>
	alert("El numero de TELEFONO ya se encuantra registrado, verifica el numero ingresado");
</script>';

	echo'<script type="text/javascript">
    window.location.href="./../acesso.php";
    </script>';

exit();


} else {
 

/*-------------------------------------------------*/
if (isset($_POST['guardar'])) {
	
	

	$NOMBRE = $_POST['cl_nombre'];
	$TELEFONO = $_POST['cl_numero'];

	


/*---KKIK---*/
$query= "INSERT INTO clientes(  
 
NOMBRE,
TELEFONO
) VALUES (
'$NOMBRE',
'$TELEFONO'
)";

/*---create ---*/
$result = mysqli_query($conexion, $query);


/*---redireccion ---*/	

mysqli_close($conexion);	
echo'<script>
	alert("Bienvenido tu registro fue procesado con exito");
</script>';

echo'<script type="text/javascript">
    window.location.href="./../acesso.php";
    </script>';
exit();



}

/*-------------------------------------------------*/



die();
}


} else {
	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../index.php";
    </script>';


die();
}

?>








 </body>
 </html>