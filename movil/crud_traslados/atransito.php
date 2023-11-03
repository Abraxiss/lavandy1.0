<?php include("./../../panel/data/conexion.php"); ?>

<?php 

/*---NEW ORDEN---*/

if (isset($_GET['id'])) {
$ID_TRASLADO=$_GET['id'];
$ID_ORD=$_GET['ord'];

/// actualisa tabla traslado
  $query = "UPDATE traslado set
    ID_STATUS_TRAS= 2,
    FECHA_RECOJO= NOW()    
/*---FECHA_ENTREGA= NOW()---*/
  WHERE ID_TRASLADO=$ID_TRASLADO";
  mysqli_query($conexion, $query);

/// actualisa tabla ordenes DE TIENDA A BASE
  $query = "UPDATE ordenes set
    STATUS_ORD =3,
    STATUS_LAVADO = 0   
  WHERE ID_ORD=$ID_ORD";
  mysqli_query($conexion, $query);

/// actualisa tabla ordenes EN RETORNO
            $queryh="SELECT traslado.ID_TRASLADO, traslado.ID_TIPO_TRASLADO
              FROM traslado
              WHERE (((traslado.ID_TRASLADO)='$ID_TRASLADO'))
            ";
          $resulth=mysqli_query($conexion, $queryh);
          $filash=mysqli_fetch_assoc($resulth);
          $TIPO_TRASLADO = $filash ['ID_TIPO_TRASLADO'];
          
if ($TIPO_TRASLADO == 3 ) {
    $query = "UPDATE ordenes set 
    STATUS_LAVADO= 5
    WHERE ID_ORD=$ID_ORD";
    mysqli_query($conexion, $query);
}


/*---redireccion ---*/
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_read.php?s=1" />
<?php

}

/*---redireccion ---*/
 
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../traslados_read.php?s=1" />
<?php

?>