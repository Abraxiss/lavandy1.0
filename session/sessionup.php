<?php @session_start();?> 
          
<?php 
if (isset($_SESSION['cliente'])) {
      $clup=$_SESSION['cliente'];
      $idclup=$_SESSION['id_cliente'];
      $cl_num=$_SESSION['cl_numero'];
      $cl_dir=$_SESSION['cl_direccion'];

} else {

}
?>

