<?php include("./../data/conexion.php"); 



if (isset($_POST['usuario'])) {
	
	$user = $_POST['usuario'];
	$clave = $_POST['pass'];

$query="SELECT * FROM user WHERE user_nombre= '$user' and user_clave= '$clave'";
	$result=mysqli_query($conexion, $query);
	$numfilas = mysqli_num_rows($result);
	$filas=mysqli_fetch_assoc($result);

if ($numfilas>0) {

@session_start();

$id_user=$filas ['id_user']; 
$_SESSION['usuario']=$user;
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