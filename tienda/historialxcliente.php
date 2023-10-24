<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br><br>

  <?php
  $id = $_GET['id'];
  $queryCC="SELECT ordenes.ID_ORD, clientes.ID_CLIENTE, clientes.NOMBRE, tiendas.ABREV, ordenes.N_ORD, ordenes.FECHA_INICIO, ordenes.FECHA_ENTREGA, ordenes.TOTAL_KILOS, ordenes.TOTAL_PRENDAS, ordenes.ADOMICILIO, ordenes.PRECIO, ordenes.OBS_ORD
FROM (ordenes INNER JOIN clientes ON ordenes.ID_CLIENTE = clientes.ID_CLIENTE) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA
WHERE (((clientes.ID_CLIENTE)='$id'));
";
  $resultCC=mysqli_query($conexion, $queryCC);
  

$query="
SELECT clientes.ID_CLIENTE, clientes.NOMBRE
FROM clientes
WHERE (((clientes.ID_CLIENTE)='$id'));";
$result=mysqli_query($conexion, $query);
$filas=mysqli_fetch_assoc($result)
  ?>


<h5>HISTORIAL DE VENTAS:</h5> 
<h5>Cliente: <?php echo $filas['NOMBRE']?></h5>

<table class="table table-sm ">
  <thead class="table-info">
    <tr>
      <th scope="col">ORDEN</th>
      <th scope="col">FECHA</th>
      <th scope="col">TIPO</th>
      <th scope="col">OBSERVASION</th>
      <th scope="col">PRECIO</th>


      <th scope="col"><center> <span class="icon-price-tags"></span></center></th>
    </tr>
  </thead>
  <tbody>
    <?php while($filasCC=mysqli_fetch_assoc($resultCC)) { ?>
    <tr>
      <th scope="row"><?php echo $filasCC['ABREV']?>-<?php echo $filasCC ['N_ORD']  ?> <br>D:<?php echo $filasCC['ADOMICILIO']?>
      </th>
      <td>INICIO: <?php echo $filasCC ['FECHA_INICIO']  ?>
        <br>ENTREGA: <?php echo $filasCC ['FECHA_ENTREGA']  ?>

      </td>
      <td>KILOS: <?php echo $filasCC ['TOTAL_KILOS']  ?>
        <br>UNIDA: <?php echo $filasCC ['TOTAL_PRENDAS']  ?>
      </td>

      </td>
      <td><?php echo $filasCC ['OBS_ORD']  ?>
        
      </td>
      <td><?php echo $filasCC ['PRECIO']  ?>
        
      </td>
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