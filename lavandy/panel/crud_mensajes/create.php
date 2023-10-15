<?php include("./../../panel/data/conexion.php"); ?>


<?php
/*---NEW MENSAJE ---*/

if (isset($_POST['guardar'])) {

/*---create MENSAJE ---*/


   
    $ID_TIPO_MSJ = $_POST['id_tipo_msj'];
    $MENSAJE = $_POST['mensaje'];
    $HIPERVINCULO = $_POST['hipervinculo'];
    $ID_USER = $_POST['id_user'];
   


$query = "INSERT INTO mensajes (
   
    ID_TIPO_MSJ,
    MENSAJE,
    HIPERVINCULO,
    ID_USER
) VALUES (
    
    '$ID_TIPO_MSJ',
    '$MENSAJE',
    '$HIPERVINCULO',
    '$ID_USER'
)";



/*---create ---*/
$result = mysqli_query($conexion, $query);


/*---redireccion ---*/
mysqli_close($conexion);    
echo'<script type="text/javascript">
    window.location.href="./../mensajes_read.php";
    </script>';

exit();

}



	?>

