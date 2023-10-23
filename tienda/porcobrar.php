<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br><br>
<h5>Lista de Cuentas por Cobrar:</h5>
  <?php 
  $queryCC="SELECT ordenes.ID_ORD, ordenes.ID_TIENDA, tiendas.ABREV, ordenes.N_ORD, ordenes.ID_CLIENTE, clientes.NOMBRE, ordenes.SALDO
FROM (ordenes INNER JOIN clientes ON ordenes.ID_CLIENTE = clientes.ID_CLIENTE) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA
WHERE (((ordenes.ID_TIENDA)='$idtiendaup') AND ((ordenes.SALDO)<>0))

";
  $resultCC=mysqli_query($conexion, $queryCC);
  
  ?>




<table class="table table-sm ">
  <thead class="table-info">
    <tr>
      <th scope="col">ORDEN</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">SALDO</th>
      <th scope="col"><center> <span class="icon-price-tags"></span></center></th>
    </tr>
  </thead>
  <tbody>
    <?php while($filasCC=mysqli_fetch_assoc($resultCC)) { ?>
    <tr>
      <th scope="row"><?php echo $filasCC['ABREV']?>-<?php echo $filasCC ['N_ORD']  ?></th>
      <td><?php echo $filasCC ['NOMBRE']  ?></td>
      <td><?php echo $filasCC ['SALDO']  ?></td>
      <td style="text-align: center;"> 

          <a href="ordenes_detalle.php?id=<?php echo $filasCC ['ID_ORD']?>" class="btn btn-dark btn-sm"> 
          <span class="icon-price-tags"></span>
          </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>






<?php include('includes/footer.php'); ?>