<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<br>

	<?php 

  $sta = $_GET['s'];

  $queryR="
SELECT traslado.ANULADO, traslado.OBS_TRASLADO, traslado.ORIGEN_TDA, traslado.ID_TIPO_TRASLADO, traslado.ID_TRASLADO, tipo_traslado.TIPO_TRASLADO, horarios_movil.HORARIO, tiendas.ABREV, tiendas.TIENDA AS TDAO, tiendas_1.TIENDA AS TDAD, ordenes.N_ORD, clientes.NOMBRE, clientes.TELEFONO, clientes.LINK_UBICACION, clientes.DIRECCION, estatus_tras.STATUS_TRAS, ordenes.OBS_ORD, traslado.ID_TRASLADO, traslado.OBS_TRASLADO, ordenes.ID_ORD, traslado.FECHA_RECOJO, traslado.FECHA_ENTREGA
FROM ((((((traslado INNER JOIN ordenes ON traslado.ID_ORD = ordenes.ID_ORD) INNER JOIN horarios_movil ON traslado.ID_HORARIO = horarios_movil.ID_HORARIO) INNER JOIN tipo_traslado ON traslado.ID_TIPO_TRASLADO = tipo_traslado.ID_TIPO) INNER JOIN tiendas ON traslado.ORIGEN_TDA = tiendas.ID_TIENDA) INNER JOIN clientes ON ordenes.ID_CLIENTE = clientes.ID_CLIENTE) INNER JOIN tiendas AS tiendas_1 ON traslado.DESTINO_TDA = tiendas_1.ID_TIENDA) INNER JOIN estatus_tras ON traslado.ID_STATUS_TRAS = estatus_tras.ID_STATUS_TRAS
WHERE (((traslado.ID_STATUS_TRAS)='$sta'))
ORDER BY traslado.ID_TRASLADO DESC;


";
	$resultR=mysqli_query($conexion, $queryR);


switch ($sta) {
    case 1:
        $active1 = 'active';
        $active2 = '';
        $active3 = '';
        $tabla = 'traslados_tabla1.php';
        break;
    case 2:
        $active1 = '';
        $active2 = 'active';
        $active3 = '';
        $tabla = 'traslados_tabla2.php';
        break;
    case 3:
        $active1 = '';
        $active2 = '';
        $active3 = 'active';
        $tabla = 'traslados_tabla3.php';
        break;
    default:
        $active = '';
        break;
} 


	?>


<div class="card ">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link <?php echo $active1 ?>" href=" traslados_read.php?s=1">PENDIENTES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $active2 ?>" href="traslados_read.php?s=2">TRANSITO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $active3 ?>" href="traslados_read.php?s=3">FINALIZADO</a>
      </li>
    </ul>
  </div>
  <div class="card-body">

<?php include($tabla) ?>

  </div>
</div>



<?php include('includes/footer.php'); ?>