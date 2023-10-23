<?php include("./../../panel/data/conexion.php"); ?>

<?php 

/*---NEW ORDEN---*/

if (isset($_POST['guardar'])) {

/*---create TRASLADO ---*/

    $ID_USER=$_POST['id_user'];
    $ID_TDA=$_POST['id_tienda_o'];
    $ID_TIPO_TRASLADO = $_POST['tipo_traslado']; 
    $ID_HORARIO = $_POST['horarios_movil'];
     $ID_ORD = $_POST['id_ord'];
     $ORIGEN_TDA = $_POST['id_tienda_o'];
     $DESTINO_TDA = $_POST['id_tienda_d'];
     $OBS_TRASLADO = $_POST['obs_traslado'];
     $ID_STATUS_TRAS = 1 ;

$query= "INSERT INTO traslado(

    ID_USER,
    ID_TDA,
    ID_TIPO_TRASLADO,
    ID_HORARIO,
    ID_ORD,
    ORIGEN_TDA,
    DESTINO_TDA,
    OBS_TRASLADO,
    ID_STATUS_TRAS
) VALUES (
    '$ID_USER',
    '$ID_TDA',
    '$ID_TIPO_TRASLADO',
    '$ID_HORARIO',
    '$ID_ORD',
    '$ORIGEN_TDA',
    '$DESTINO_TDA',
    '$OBS_TRASLADO',
    '$ID_STATUS_TRAS'
)";

/*---create ---*/
$result = mysqli_query($conexion, $query);


/*---redireccion ---*/
mysqli_close($conexion);    
echo'<script type="text/javascript">
    window.location.href="./../traslados_read_p.php";
    </script>';

exit();

}



?>