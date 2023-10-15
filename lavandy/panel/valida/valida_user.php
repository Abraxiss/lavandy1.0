<?php include("./../../panel/data/conexion.php"); 





if (isset($_POST['usuario'])) {
	
	$user = $_POST['usuario'];
	$clave = $_POST['pass'];



$query="SELECT * FROM usuarios WHERE user_dni= '$user' and user_clave= '$clave' and user_perfil= 1 ";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);

if ($numfilas>0) {

@session_start();

$id_user=$filas ['id_user']; 
$n_user=$filas ['user_nombre'];

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