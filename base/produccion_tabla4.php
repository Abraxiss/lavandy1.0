<?php  
  $queryR="
SELECT ordenes.ID_ORD, tiendas.ABREV, ordenes.N_ORD, ordenes.FECHA_INICIO, ordenes.HORA_INICIO, ordenes.FECHA_ENTREGA, ordenes.HORA_ENTREGA, estatus_lavado.st_lavado, estatus_lavado.Alcance, estatus_lavado.id_st_lavado, ordenes.TOTAL_KILOS, ordenes.TOTAL_PRENDAS, ordenes.OBS_ORD
FROM (ordenes INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN estatus_lavado ON ordenes.STATUS_LAVADO = estatus_lavado.id_st_lavado
WHERE (((estatus_lavado.id_st_lavado) IN (5)));


";
  $resultR=mysqli_query($conexion, $queryR);
?>


<table class="table table-striped table-sm">

  <thead  class="thead-dark " >
    <tr>
      <th scope="col">ORDEN</th>
      <th scope="col">CONTENIDO</th>
      <th scope="col">FECHAS </th>
      <th scope="col"> LAVADO </th>
      <th scope="col"> OBSERVACION </th>

      

    </tr>
  </thead>
  <tbody>
   
      <?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr> 

          <th scope="row">
          <a type="button" class="btn btn-primary" href="./ordenes_detalle.php?id=<?php echo $filasR ['ID_ORD']  ?>" > 
          <span class="icon-price-tags"></span>           
           <?php echo $filasR ['ABREV']  ?> -
           <?php echo $filasR ['N_ORD']  ?>
          </a> 

          </th> 
          <td >
           KG:<?php echo $filasR ['TOTAL_KILOS']  ?> <br>
           UND:<?php echo $filasR ['TOTAL_PRENDAS']  ?> 
             
          </td>
          <td >
           F.INICIO: <?php echo $filasR ['FECHA_INICIO']  ?>-
           <?php echo $filasR ['HORA_INICIO']  ?><br>
           F.ENTREGA: <?php echo $filasR ['FECHA_ENTREGA']  ?>-
           <?php echo $filasR ['HORA_ENTREGA']  ?> 
          </td>
          <td>
           <?php echo $filasR ['st_lavado']  ?>
          </td>
          <td>
           <?php echo $filasR ['OBS_ORD']  ?>
          </td>

                  
      </tr>
    <?php } ?>


    
    
  </tbody>
</table>
