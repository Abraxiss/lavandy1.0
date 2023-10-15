<?php include("./../../panel/data/conexion.php"); 





if (isset($_POST['usuario'])) {
	
	$user = $_POST['usuario'];
	$clave = $_POST['pass'];
	$idtienda = $_POST['id_tienda'];


$query1="SELECT * FROM tiendas WHERE ID_TIENDA= '$idtienda' ";
	$result1=mysqli_query($conexion, $query1);
	$filas1=mysqli_fetch_assoc($result1);


$query="SELECT * FROM usuarios WHERE user_dni= '$user' and user_clave= '$clave' and user_perfil= 3";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);

if ($numfilas>0) {

@session_start();

$id_user=$filas ['id_user']; 
$n_user=$filas ['user_nombre'];
$n_tienda=$filas1 ['TIENDA'];

$_SESSION['id_tienda']=$idtienda;
$_SESSION['tienda']=$n_tienda;
$_SESSION['usuario']=$n_user;
$_SESSION['id_usuario']=$id_user;

	echo'<script type="text/javascript">
    window.location.href="./../home.php";
    </script>';
mysqli_close($conexion);
exit();


} else {
	mysqli_close($conexion);
	echo'<script type="text/javascript">
    window.location.href="./../index.php";
    </script>';


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