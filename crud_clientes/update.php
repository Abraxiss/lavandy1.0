<?php include("./../panel/data/conexion.php"); ?>
<?php include("./../session/sessionup.php"); ?>


<?php


if (isset($_POST['cl_nombre'])) {

    $c1 = $_POST['id_cliente'];
	  $c2 = $_POST['cl_nombre'];  
    $c3 = $_POST['cl_email'];
    $c4 = $_POST['cl_numero'];
    $c5 = $_POST['cl_clave'];
    $c6 = $_POST['cl_direccion'];
    $c7 = $_POST['cl_dni'];

  $query = "UPDATE clientes set

cl_nombre ='$c2',
cl_email ='$c3',
cl_numero ='$c4',
cl_clave ='$c5',
cl_direccion  ='$c6',
cl_dni  ='$c7'

  WHERE id_cliente=$c1";

  mysqli_query($conexion, $query);

}


mysqli_close($conexion);

echo'<script>
    alert("Tu datos fueron actualizados con exito");
</script>';


echo'<script type="text/javascript">
    window.location.href="./../micuenta.php";
    </script>';
exit();

?>