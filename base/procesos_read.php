<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>

<?php 

if (isset($_GET['id'])) {
$IDTLL=$_GET['id'];

  $queryo="
  SELECT detallesdeord.ID_DETALLE, detallesdeord.ID_ORD, ordenes.N_ORD, ordenes.ID_TIENDA, tiendas.ABREV, detallesdeord.CANTIDA, detallesdeord.DESCRIPCION, detallesdeord.COLOR, detallesdeord.STADO_PREN
FROM tiendas INNER JOIN (detallesdeord INNER JOIN ordenes ON detallesdeord.ID_ORD = ordenes.ID_ORD) ON tiendas.ID_TIENDA = ordenes.ID_TIENDA
WHERE (((detallesdeord.ID_DETALLE)='$IDTLL'));

";

  $resulto=mysqli_query($conexion, $queryo);
$filaso=mysqli_fetch_assoc($resulto);

}
?>

<!-- CARD -->
<div class="card text-center">
  <div class="card-header">
    <B><h4>
    <span class="icon-price-tags"></span> ORDEN | <?php echo $filaso ['ABREV']?>-<?php echo $filaso ['N_ORD']?> 
    </B></h4>

</div>

  </div>
</div>

<br>  




<!-- tabla -->
  <?php 
  $queryD="
  SELECT procesos.ID_ORD_DTLL, secuencias.SECUENCIA, procesos.F_INICIO, procesos.H_INICIO, procesos.OBS_PROCESO, procesos.ID_SECUENCIA, metodos.METODO
FROM (procesos LEFT JOIN secuencias ON procesos.ID_SECUENCIA = secuencias.ID_SECUENCIA) LEFT JOIN metodos ON procesos.ID_METODO = metodos.ID_METODO
WHERE (((procesos.ID_ORD_DTLL)='$IDTLL'))
ORDER BY procesos.ID_SECUENCIA;


";
  $resultD=mysqli_query($conexion, $queryD);


  ?>
<div class="container">
  <div class="row">
    <div class="col-sm">
  
<h4>PROCESOS</h4>
<table class="table table-striped table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">INICIO</th>      
      <th scope="col">SECUENCIA</th>
      <th scope="col">METODO</th>
      <th scope="col">OBSERVACION</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    <?php while ($filasD = mysqli_fetch_assoc($resultD)) { ?>
      <tr>
        <th scope="row"><?php echo $filasD['ID_SECUENCIA'] ?> </th>
        <td><?php echo $filasD['F_INICIO'] ?>   </td>
        <td><?php echo $filasD['SECUENCIA'] ?>  </td>
        <td><?php echo $filasD['METODO'] ?>  </td>
        <td><?php echo $filasD['OBS_PROCESO'] ?>  </td>
        <td> </td>

      </tr>
    <?php } ?>
  </tbody>
</table>

    </div>

  </div>
</div>


  

<?php include('includes/footer_datatables.php'); ?>