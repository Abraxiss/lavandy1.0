<?php include('../includes/session.php'); ?>
<?php include("./../../panel/data/conexion.php"); ?>
<?php 

/*---NEW ORDEN---*/

if (isset($_GET['id'])) {

  $ID_DETALLE=$_GET['id'];
  $ID_ORD=$_GET['io'];
  $ID_SECUENCIA=$_GET['s'];  
  $F_INICIO = date("Y-m-d");
  $H_INICIO = date("H:i:s");
  $ID_USER = $id_userup;

$query1= "INSERT INTO procesos(
ID_ORD,
ID_ORD_DTLL,
ID_SECUENCIA,
F_INICIO,
H_INICIO,
ID_USER
) VALUES (
'$ID_ORD', 
'$ID_DETALLE',
'$ID_SECUENCIA',
'$F_INICIO',
'$H_INICIO', 
'$ID_USER'
)";



switch ($ID_SECUENCIA) {
    case 1:
$query = "UPDATE detallesdeord set 
ID_SECUENCIA= $ID_SECUENCIA,
PENDIENTE= 1
WHERE ID_DETALLE=$ID_DETALLE";
mysqli_query($conexion, $query);
$result = mysqli_query($conexion, $query1);
        break;
    case 2:
$query = "UPDATE detallesdeord set 
ID_SECUENCIA= $ID_SECUENCIA,
PRELAVADO= 1
WHERE ID_DETALLE=$ID_DETALLE";
mysqli_query($conexion, $query);
$result = mysqli_query($conexion, $query1);
        break;
    case 3:
$query = "UPDATE detallesdeord set 
ID_SECUENCIA= $ID_SECUENCIA,
LAVADO= 1
WHERE ID_DETALLE=$ID_DETALLE";
mysqli_query($conexion, $query);
$result = mysqli_query($conexion, $query1);
        break;
    case 4:
$query = "UPDATE detallesdeord set 
ID_SECUENCIA= $ID_SECUENCIA,
SECADO= 1
WHERE ID_DETALLE=$ID_DETALLE";
mysqli_query($conexion, $query);
$result = mysqli_query($conexion, $query1);
        break;
    case 5:
$query = "UPDATE detallesdeord set 
ID_SECUENCIA= $ID_SECUENCIA,
PLANCHADO= 1
WHERE ID_DETALLE=$ID_DETALLE";
mysqli_query($conexion, $query);
$result = mysqli_query($conexion, $query1);
        break;
    case 6:
$query = "UPDATE detallesdeord set 
ID_SECUENCIA= $ID_SECUENCIA,
DOBLADO= 1
WHERE ID_DETALLE=$ID_DETALLE";
mysqli_query($conexion, $query);
$result = mysqli_query($conexion, $query1);
        break;
    case 7:
$query = "UPDATE detallesdeord set 
ID_SECUENCIA= $ID_SECUENCIA,
RELAVADO= 1
WHERE ID_DETALLE=$ID_DETALLE";
mysqli_query($conexion, $query);
$result = mysqli_query($conexion, $query1);
        break;        
    case 8:
$query = "UPDATE detallesdeord set 
ID_SECUENCIA= $ID_SECUENCIA,
FINALIZADO= 1
WHERE ID_DETALLE=$ID_DETALLE";
mysqli_query($conexion, $query);
$result = mysqli_query($conexion, $query1);
        break; 
} 


 ?><meta http-equiv="refresh" content="0;url=./../detalle_secuencia.php?id=<?php echo $ID_ORD ?>" /><?php


} 
?>