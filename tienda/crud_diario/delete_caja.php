<?php include("./../../panel/data/conexion.php"); ?>

<?php 

if (isset($_GET['d'])) {
	$ID_ORD= $_GET['o'];
	$ID_DIARIO = $_GET['d'];


$queryD="SELECT diario.ID_DIARIO, diario.FECHA_OP
	FROM diario
	WHERE (((diario.ID_DIARIO)='$ID_DIARIO'));
";
$resultD=mysqli_query($conexion, $queryD);
$filasD=mysqli_fetch_assoc($resultD);
$FECHADELETE= $filasD ['FECHA_OP'];

/*---query elimina---*/
$query= "DELETE FROM diario WHERE FECHA_OP= '$FECHADELETE'";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);

mysqli_close($conexion);
 ?>     
<meta http-equiv="refresh" 
      content="0;url=../crud_ordenes/update_importes.php?id=<?php echo $ID_ORD ?>" />
<?php 


exit();


}

?>