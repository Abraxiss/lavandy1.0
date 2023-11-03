<?php include("./../../panel/data/conexion.php"); ?>

<?php

if (isset($_POST['id_ord'])) {
  $ID_ORD=$_POST['id_ord'];
  $query="SELECT ordenes.ID_ORD, ordenes.STATUS_ORD
  FROM ordenes
  WHERE (((ordenes.ID_ORD)='$ID_ORD') AND ((ordenes.STATUS_ORD)=6)); ";
  $result=mysqli_query($conexion, $query);
  $numfilas = mysqli_num_rows($result);
  
  if ($numfilas>0) { 

/// actualisa tabla
  $query = "UPDATE ordenes set 
  STATUS_ORD= 7
  WHERE ID_ORD=$ID_ORD";
  mysqli_query($conexion, $query);
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 

exit();


  } else {

echo'<script>
  alert("La orden de servicio no se encuentra listo para su entrega. Verifica el estatus de la orden...");
</script>';

 echo '<script type="text/javascript">
    window.location.href="./../ordenes_detalle.php?id=' . $ID_ORD . '";
</script>';


  }
}
?>