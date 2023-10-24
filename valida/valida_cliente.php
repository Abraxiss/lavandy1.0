<?php session_start();
include("./../panel/data/conexion.php"); 



if (isset($_POST['fono'])) {

	$FONO = $_POST['fono'];
	



$query="SELECT * FROM clientes WHERE TELEFONO= '$FONO' ";

	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);

	

if ($numfilas>0) {


	
$id_cliente=$filas ['ID_CLIENTE'];
$cliente=$filas ['NOMBRE'];
$cl_num=$filas ['TELEFONO']; 
$cl_direccion=$filas ['DIRECCION']; 

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

}


} else {
	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../acesso.php";
    </script>';


}

?>