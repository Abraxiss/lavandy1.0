
<?php
date_default_timezone_set('America/Lima');


$servername = 'localhost';
$username = 'root';  // Nombre de usuario
$password = '';  // Contraseña (en este caso está vacía)
$database = 'lavandy';

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Establecer la codificación de caracteres a UTF-8
$conexion->set_charset('utf8');
?>



<?php
/*
		$conexion = mysqli_connect(
		'localhost',
		'id14004671_sitarcin',		  
		'Peru_2020_codex',
		'id14004671_havrax'
		) or die(mysqli_erro($mysqli));
*/		  
?>


<?php
/*
		$conexion = mysqli_connect(
		'sql301.tonohost.com',
		'ottos_26049287',		  
		'Peru2020',
		'ottos_26049287_one'
		) or die(mysqli_erro($mysqli));
*/		  
?>