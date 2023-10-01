<?php include("./../../panel/data/conexion.php"); ?>

<?php 

/*---NEW ITEM---*/

if (isset($_POST['guardar'])) {

    $ID_ORD = $_POST['id_ord'];
    $TIPO_VTA = $_POST['tipo_vta'];
    $CANTIDA = $_POST['cantidad'];
    $DESCRIPCION = $_POST['descripcion'];
    $COLOR = $_POST['color'];
    $STATUS_PROD = $_POST['status_prod'];
    $PRECIO_UNITARIO = $_POST['precio_unitario'];
    $PRECIO_TOTAL = $CANTIDA * $PRECIO_UNITARIO;
    $OBSERVACION_DTLL = $_POST['observacion_dtll'];


if ($TIPO_VTA=="KILO") {
   $TOTAL_KILOS = $CANTIDA; 
} else {
    $TOTAL_KILOS = 0; 
}


if ($TIPO_VTA=="UNIDA") { 
    $TOTAL_PRENDAS = $CANTIDA; 
} else {
    $TOTAL_PRENDAS = 0; 
}

$query= "INSERT INTO detallesdeord(

        ID_ORD,
        TIPO_VTA,
        CANTIDA,
        DESCRIPCION,
        COLOR,
        STATUS_PROD,
        PRECIO_UNITARIO,
        PRECIO_TOTAL,
        OBSERVACION_DTLL

    ) VALUES (
        '$ID_ORD',
        '$TIPO_VTA',
        '$CANTIDA',
        '$DESCRIPCION',
        '$COLOR',
        '$STATUS_PROD',
        '$PRECIO_UNITARIO',
        '$PRECIO_TOTAL',
        '$OBSERVACION_DTLL'
    )";

/*---create ---*/
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
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php 
exit();
};


 
/*---redireccion ---*/
 ?>   
<meta http-equiv="refresh" 
      content="0;url=./../ordenes_detalle.php?id=<?php echo $ID_ORD ?>" />
<?php

exit();

}

?>