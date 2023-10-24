<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
date_default_timezone_set('America/Lima');

$servername = 'localhost';
$username = 'grupolav_cristian';
$password = 'c.rivera.a.2020';;('America/Lima');
$database = 'grupolav_andy';

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

echo 'Conexión exitosa a la base de datos.';

?>

<?php
/*
<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');


date_default_timezone_set('America/Lima');
$servername = 'localhost';
$port = 3306; // El puerto 3306 es el puerto MySQL predeterminado
$username = 'grupolav_cristian';
$password = 'c.rivera.a.2020';('America/Lima');
$database = 'grupolav_andy';

// Intenta establecer la conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $database);

// Verifica si hubo un error en la conexión
if ($conexion->connect_error) {
    // Hubo un error, muestra un mensaje de error
    echo 'No se pudo conectar a la base de datos. Error: ' . $conexion->connect_error;
} else {
    // La conexión se estableció correctamente, muestra un mensaje de éxito
    echo 'Conexión exitosa a la base de datos.';
    $conexion->set_charset('utf8');
    // Aquí puedes realizar consultas y operaciones en la base de datos
}


?>
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