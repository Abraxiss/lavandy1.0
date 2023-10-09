<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<br>
<?php include('traslado_modal.php'); ?>

<br>

	<?php 

  $sta = $_GET['s'];

  $queryR="SELECT traslado.ANULADO,  traslado.OBS_TRASLADO, traslado.ORIGEN_TDA, traslado.ID_TIPO_TRASLADO, traslado.ID_TRASLADO, tipo_traslado.TIPO_TRASLADO, horarios_movil.HORARIO, tiendas.ABREV, tiendas.TIENDA AS TDAO, tiendas_1.TIENDA AS TDAD, ordenes.N_ORD, clientes.NOMBRE, clientes.TELEFONO, clientes.LINK_UBICACION, clientes.DIRECCION, estatus_tras.STATUS_TRAS, ordenes.OBS_ORD, traslado.ID_TRASLADO
FROM ((((((traslado INNER JOIN ordenes ON traslado.ID_ORD = ordenes.ID_ORD) INNER JOIN horarios_movil ON traslado.ID_HORARIO = horarios_movil.ID_HORARIO) INNER JOIN tipo_traslado ON traslado.ID_TIPO_TRASLADO = tipo_traslado.ID_TIPO) INNER JOIN tiendas ON traslado.ORIGEN_TDA = tiendas.ID_TIENDA) INNER JOIN clientes ON ordenes.ID_CLIENTE = clientes.ID_CLIENTE) INNER JOIN tiendas AS tiendas_1 ON traslado.DESTINO_TDA = tiendas_1.ID_TIENDA) INNER JOIN estatus_tras ON traslado.ID_STATUS_TRAS = estatus_tras.ID_STATUS_TRAS
WHERE (((traslado.ID_TDA)='$idtiendaup') AND ((traslado.ID_STATUS_TRAS)='$sta'))
ORDER BY traslado.ID_TRASLADO DESC";
	$resultR=mysqli_query($conexion, $queryR);


switch ($sta) {
    case 1:
        $active1 = 'active';
        $active2 = '';
        $active3 = '';
        break;
    case 2:
        $active1 = '';
        $active2 = 'active';
        $active3 = '';
        break;
    case 3:
        $active1 = '';
        $active2 = '';
        $active3 = 'active';
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



  </div>
</div>

<table class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">CLIENTE </th>
      <th scope="col">ORIGEN</th>
      <th scope="col">DESTINO</th>
      <th scope="col"> ANULADO </th>
      <th scope="col">ALCANCE</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
   
      <?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr> 

          <th>
            <a href="tel:+51<?php echo $filasR ['TELEFONO'] ?>" class="btn 
              btn-primary btn-sm " target="_blank"> 
              <span class="icon-phone "></span>
            </a> 
            <?php echo $filasR ['NOMBRE']  ?> 
 
            <br>
              <a href="https://api.whatsapp.com/send?phone=51<?php echo $filasR ['TELEFONO'] ?>" class="btn btn-success btn-sm " target="_blank"> 
              <span class="icon-whatsapp "></span>
              </a>         
             <a target="_blank" href="<?php echo $filasR ['LINK_UBICACION']  ?>"> 
              <span class="icon-location"></span> <?php echo $filasR ['DIRECCION']  ?></a> 

          </th> 

          <td scope="row">
           <span class="icon-home3"> </span>  
           <?php echo $filasR ['TDAO']  ?>
           <br>
           <span class="icon-clock2"> </span>  
           <?php echo $filasR ['HORARIO']  ?>
             
          </td>

          <td>
           <span class="icon-home3"> </span>  
           <?php echo $filasR ['TDAD']  ?>
           
           <br>
           <span class="icon-price-tags"> </span>
           <?php echo $filasR ['ABREV']  ?> -
           <?php echo $filasR ['N_ORD']  ?> 
          </td>

           <td>
          
           <?php echo $filasR ['ANULADO']  ?> 
          </td>

          <td>
            <?php echo $filasR ['OBS_ORD']  ?>
            
              <br>
              <label style="color: red;">
                <?php echo $filasR ['STATUS_TRAS']  ?>
              </label>
           
          </td>         


      <td> 
          <a href="traslados_update.php?id=<?php echo $filasR ['ID_TRASLADO']  ?>" class="btn btn-primary"> 
          <span class="icon-checkmark"></span>
          </a> |


      </td>
      </tr>
    <?php } ?>


    
    
  </tbody>
</table>



<?php include('includes/footer.php'); ?>