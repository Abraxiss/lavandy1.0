<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<br>
<?php include('traslado_modal.php'); ?>

<br>

  <?php 
  $queryR="SELECT * FROM vista_traslados
WHERE (((vista_traslados.ORIGEN_TDA)='$idtiendaup') 
  AND ((vista_traslados.STATUS_TRAS)=1))";
  $resultR=mysqli_query($conexion, $queryR);

  ?>


<div class="card ">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="traslados_read_p.php">PENDIENTES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="traslados_read_t.php">TRANSITO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="traslados_read_f.php">FINALIZADO</a>
      </li>
    </ul>
  </div>
  <div class="card-body">



  </div>
</div>

<?php include('traslado_tabla.php'); ?>



<?php include('includes/footer.php'); ?>