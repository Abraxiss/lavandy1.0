<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>
<?php include('menubar.php'); ?>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<br>
  <?php 

  $sta = $_GET['s'];

switch ($sta) {
    case 1:
        $active1 = 'active';
        $active2 = '';
        $active3 = '';
        $active4 = '';
        $tabla = 'produccion_tabla1.php';
        break;
    case 2:
        $active1 = '';
        $active2 = 'active';
        $active3 = '';
        $active4 = '';
        $tabla = 'produccion_tabla2.php';
        break;
    case 3:
        $active1 = '';
        $active2 = '';
        $active3 = 'active';
        $active4 = '';
        $tabla = 'produccion_tabla3.php';
        break;
    case 4:
        $active1 = '';
        $active2 = '';
        $active3 = '';
        $active4 = 'active';
        $tabla = 'produccion_tabla4.php';
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
        <a class="nav-link <?php echo $active1 ?>" href=" produccion_read.php?s=1">RECEPCION</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $active2 ?>" href="produccion_read.php?s=2">PROCESO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $active3 ?>" href="produccion_read.php?s=3">FINALIZADO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $active4 ?>" href="produccion_read.php?s=4">ENTREGADOS</a>
      </li>
    </ul>
  </div>
  <div class="card-body">


<?php include($tabla) ?>

  </div>
</div>

<?php include('includes/footer.php'); ?>