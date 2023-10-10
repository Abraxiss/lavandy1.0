<?php include("./../../panel/data/conexion.php"); ?>

<?php 

/*---NEW ORDEN---*/

if (isset($_POST['guardar'])) {

    $ID_USER=$_POST['id_user'];
    $N_ORD=$_POST['n_ord'];
    $ID_TIENDA=$_POST['id_tienda'];
    $ID_CLIENTE=$_POST['id_cliente'];
    $FECHA_INICIO=$_POST['fecha_inicio'];
    $HORA_INICIO=$_POST['hora_inicio'];
    $FECHA_ENTREGA=$_POST['fecha_entrega'];
    $HORA_ENTREGA=$_POST['hora_entrega'];
    $ID_LAVADO=$_POST['id_lavado'];
    $ID_PERFUME=$_POST['id_perfume'];
    $ADOMICILIO=$_POST['adomicilio'];
    $OBS_ORD=$_POST['obs_ord'];

    $queryN="SELECT ordenes.ID_ORD, ordenes.N_ORD 
    FROM ordenes
    WHERE (((ordenes.N_ORD)='$N_ORD')) ";
    $resultN=mysqli_query($conexion, $queryN);
    $numfilas = mysqli_num_rows($resultN);

if ($numfilas>0) {?>

    <div class="container col-7">

    <h5>El NUMERO DE ORDEN ya se encuentra Registrado...</h5>
    
     <a href="./../ordenes_read.php" class="btn btn-primary  btn-block" >Regresar...</a>     
     </div>
    <?php
    die();

} else {
    

/*---create ORDEN ---*/

$query= "INSERT INTO ordenes(

ID_USER,
N_ORD,
ID_TIENDA,
ID_CLIENTE,
FECHA_INICIO,
HORA_INICIO,
FECHA_ENTREGA,
HORA_ENTREGA,
ID_LAVADO,
ID_PERFUME,
ADOMICILIO,
OBS_ORD

) VALUES (

'$ID_USER',
'$N_ORD',
'$ID_TIENDA',
'$ID_CLIENTE',
'$FECHA_INICIO',
'$HORA_INICIO',
'$FECHA_ENTREGA',
'$HORA_ENTREGA',
'$ID_LAVADO',
'$ID_PERFUME',
'$ADOMICILIO',
'$OBS_ORD'

)";

$result = mysqli_query($conexion, $query);


/*---create TRASLADO ---*/

   
    $TIPO_TRASLADO = 1 ;
    $ID_HORARIO = $_POST['horarios_movil'];
     
          $queryh="SELECT ordenes.ID_ORD, ordenes.N_ORD
            FROM ordenes
            WHERE (((ordenes.N_ORD)='$N_ORD'));
            ";
          $resulth=mysqli_query($conexion, $queryh);
          $filash=mysqli_fetch_assoc($resulth);

     $ID_ORD = $filash ['ID_ORD'];
     $ORIGEN_TDA = $ID_TIENDA;
     $DESTINO_TDA = 9;
     $OBS_TRASLADO = "Venta tienda a base ";
     $STATUS_TRAS = 1 ;

$query= "INSERT INTO traslado(

    ID_USER,
    TIPO_TRASLADO,
    ID_HORARIO,
    ID_ORD,
    ORIGEN_TDA,
    DESTINO_TDA,
    OBS_TRASLADO,
    STATUS_TRAS
) VALUES (
    '$ID_USER',
    '$TIPO_TRASLADO',
    '$ID_HORARIO',
    '$ID_ORD',
    '$ORIGEN_TDA',
    '$DESTINO_TDA',
    '$OBS_TRASLADO',
    '$STATUS_TRAS'
)";

/*---create ---*/
$result = mysqli_query($conexion, $query);


/*---redireccion ---*/
mysqli_close($conexion);    
echo'<script type="text/javascript">
    window.location.href="./../ordenes_read.php";
    </script>';

exit();

}

/*---redireccion ---*/
mysqli_close($conexion);    
echo'<script type="text/javascript">
    window.location.href="./../ordenes_read.php";
    </script>';

exit();



}

?>