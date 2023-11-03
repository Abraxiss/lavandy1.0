<?php include("./../../panel/data/conexion.php"); ?>

<?php 

if (isset($_GET['id'])) {
  $ID_PROCESO=$_GET['ip'];  
  $ID_DETALLE=$_GET['id'];
  $ID_ORD=$_GET['io'];



/*---query elimina---*/
$query= "DELETE FROM procesos WHERE ID_PROCESO= '$ID_PROCESO'";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);


 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../procesos_create.php?id=<?php echo $ID_DETALLE ?>&io=<?php echo $ID_ORD ?>&ip=<?php echo $ID_PROCESO ?>" />
      
<?php


exit();


}

?>