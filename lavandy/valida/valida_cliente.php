<?php include("./../panel/data/conexion.php"); 



if (isset($_POST['dni'])) {

	$dni = $_POST['dni'];
	$clave = $_POST['pass'];



$query="SELECT * FROM clientes WHERE cl_dni= '$dni' and cl_clave= '$clave'";

	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);

	

if ($numfilas>0) {

@session_start();
	
$id_cliente=$filas ['id_cliente'];
$cliente=$filas ['cl_nombre'];
$cl_num=$filas ['cl_numero']; 
$cl_direccion=$filas ['cl_direccion']; 

$_SESSION['cliente']=$cliente;
$_SESSION['id_cliente']=$id_cliente;
$_SESSION['cl_numero']=$cl_num;
$_SESSION['cl_direccion']=$cl_direccion;



	echo'<script type="text/javascript">
    window.location.href="./../perfil.php";
    </script>';
mysqli_close($conexion);
exit();


} else {
	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../acesso.php";
    </script>';


die();
}


} else {
	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../acesso.php";
    </script>';


die();
}

?>