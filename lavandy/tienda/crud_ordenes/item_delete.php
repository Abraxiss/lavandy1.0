
<?php include("../../panel/data/conexion.php"); ?>
<?php 

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$ID_ORD = $_GET['io'];
/*---query elimina---*/
$query= "DELETE FROM detallesdeord WHERE ID_DETALLE= $id";
/*---ejecuta ---*/
$result = mysqli_query($conexion, $query);

 /*---SUMA DE KILOS---*/
     $queryK="SELECT detallesdeord.ID_ORD, detallesdeord.TIPO_VTA, Sum(detallesdeord.CANTIDA) AS SumaDeCANTIDA
        FROM detallesdeord
        GROUP BY detallesdeord.ID_ORD, detallesdeord.TIPO_VTA
        HAVING (((detallesdeord.ID_ORD)='$ID_ORD') AND ((detallesdeord.TIPO_VTA)='KILO'))";
        $resultK=mysqli_query($conexion, $queryK);
        $numfilasK = mysqli_num_rows($resultK);
        $filasK=mysqli_fetch_assoc($resultK);
        if ($numfilasK>0) {
            $T_KILOS=$filasK ['SumaDeCANTIDA'] ;
        } else {
            $T_KILOS=0;
        };

     /*---SUMA DE PRENDAS X UNIDAD---*/   
     $queryU="SELECT detallesdeord.ID_ORD, detallesdeord.TIPO_VTA, Sum(detallesdeord.CANTIDA) AS SumaDeCANTIDA
        FROM detallesdeord
        GROUP BY detallesdeord.ID_ORD, detallesdeord.TIPO_VTA
        HAVING (((detallesdeord.ID_ORD)='$ID_ORD') AND ((detallesdeord.TIPO_VTA)='UNIDA'))";
        $resultU=mysqli_query($conexion, $queryU);
        $numfilasU = mysqli_num_rows($resultU);
        $filasU=mysqli_fetch_assoc($resultU);
        if ($numfilasU>0) {
            $T_PRENDAS=$filasU ['SumaDeCANTIDA'] ;
        } else {
            $T_PRENDAS=0;
        };


     /*---SUMA DE PRECIOS --*/ 
     $queryS="SELECT detallesdeord.ID_ORD, Sum(detallesdeord.PRECIO_UNITARIO) AS SumaDePRECIO_UNITARIO,  Sum(detallesdeord.PRECIO_TOTAL) AS SumaDePRECIO_TOTAL
            FROM detallesdeord
        GROUP BY detallesdeord.ID_ORD
        HAVING (((detallesdeord.ID_ORD)='$ID_ORD'))";
        $resultS=mysqli_query($conexion, $queryS);
        $numfilas = mysqli_num_rows($resultS);
        $filasS=mysqli_fetch_assoc($resultS);
   
if ($numfilas>0) {


$PRECIO_TOTAL = $filasS ['SumaDePRECIO_TOTAL'];

     $query2 = "UPDATE ordenes set
        TOTAL_KILOS =$T_KILOS,
        TOTAL_PRENDAS =$T_PRENDAS,
        PRECIO = $PRECIO_TOTAL
        

      WHERE ID_ORD=$ID_ORD";

      mysqli_query($conexion, $query2);

} else {
    /*---redireccion ---*/
mysqli_close($conexion);    
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 

exit();
};






if (!$result) {
	die('Invalid query: ' . mysqli_error());
	}

 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 

exit();

}

?>