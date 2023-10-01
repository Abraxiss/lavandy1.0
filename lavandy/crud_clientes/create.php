 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
<?php include("./../panel/data/conexion.php"); ?> 

	
 </head>
 <body>
<?php
if (isset($_POST['guardar'])) {
	
	$dni = $_POST['cl_dni'];
	

$query="SELECT cl_dni FROM clientes WHERE cl_dni= '$dni' ";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);






if ($numfilas>0) {

echo'<script>
	alert("El numero de DNI ya se encuantra registrado, verifica el numero ingresado");
</script>';

	echo'<script type="text/javascript">
    window.location.href="./../acesso.php";
    </script>';

exit();


} else {
 
 echo $numfilas ;
die();
/*-------------------------------------------------*/
if (isset($_POST['guardar'])) {
	
	

	$c2 = $_POST['cl_nombre'];
	$c4 = $_POST['cl_numero'];
	$c5 = $_POST['cl_clave'];
	$c7 = $_POST['cl_dni'];
	


/*---KKIK---*/
$query= "INSERT INTO clientes(  
 
cl_nombre,
cl_numero,
cl_clave,
cl_dni
) VALUES (
'$c2',
'$c4',
'$c5',
'$c7'
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