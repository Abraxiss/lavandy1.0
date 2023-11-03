<?php include("./../../panel/data/conexion.php"); ?>

<?php 

/*---NEW ORDEN---*/

if (isset($_GET['id'])) {
$ID_TRASLADO=$_GET['id'];
$ID_ORD=$_GET['ord'];


/// actualisa tabla traslado
  $query = "UPDATE traslado set 
  ID_STATUS_TRAS= 3,
  FECHA_ENTREGA= NOW()
  WHERE ID_TRASLADO=$ID_TRASLADO";
  mysqli_query($conexion, $query);

/// actualisa tabla ordenes
            $queryh="SELECT traslado.ID_TRASLADO, traslado.ID_TIPO_TRASLADO
              FROM traslado
              WHERE (((traslado.ID_TRASLADO)='$ID_TRASLADO'))
            ";
          $resulth=mysqli_query($conexion, $queryh);
          $filash=mysqli_fetch_assoc($resulth);
          $TIPO_TRASLADO = $filash ['ID_TIPO_TRASLADO'];

if ($TIPO_TRASLADO == 3 ) {

  /// actualisa tabla base a tienda
  $query = "UPDATE ordenes set
  STATUS_ORD =6,
  STATUS_LAVADO = 0    
  WHERE ID_ORD=$ID_ORD";
  mysqli_query($conexion, $query);

} else if ($TIPO_TRASLADO == 1 ) {

  /// actualisa tabla tienda a base
  $query = "UPDATE ordenes set
  STATUS_ORD =4,
  STATUS_LAVADO = 1   
  WHERE ID_ORD=$ID_ORD";
  mysqli_query($conexion, $query);
}





/*---redireccion ---*/
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_read.php?s=2" />
<?php

}

/*---redireccion ---*/
 
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_read.php?s=2" />
<?php

?>