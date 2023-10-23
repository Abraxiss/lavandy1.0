<?php  
  $queryR="
SELECT detallesdeord.ID_DETALLE, detallesdeord.ID_ORD, tiendas.ABREV, ordenes.N_ORD, detallesdeord.DESCRIPCION, ordenes.FECHA_ENTREGA, ordenes.HORA_ENTREGA, detallesdeord.STADO_LAVADO, estatus_lavado.st_lavado
FROM ((detallesdeord INNER JOIN ordenes ON detallesdeord.ID_ORD = ordenes.ID_ORD) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN estatus_lavado ON detallesdeord.STADO_LAVADO = estatus_lavado.id_st_lavado
WHERE (((detallesdeord.STADO_LAVADO)=1))
ORDER BY detallesdeord.ID_ORD DESC;

";
  $resultR=mysqli_query($conexion, $queryR);
?>


<table class="table table-striped table-sm">

  <thead  class="thead-dark">
    <tr>
      <th scope="col">PRENDA </th>
      <th scope="col">ORDEN</th>
      <th scope="col">FECHA ENTREGA</th>
      <th scope="col"> ESTADO </th>
      <th scope="col">CONFIRMAR</th>

    </tr>
  </thead>
  <tbody>
   
      <?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr> 

          <th>
            <?php echo $filasR ['DESCRIPCION'] ?>


          </th> 

          <td scope="row">
           <?php echo $filasR ['ABREV']  ?>-
           <?php echo $filasR ['N_ORD']  ?>
             
          </td>

          <td>
           <?php echo $filasR ['FECHA_ENTREGA']  ?>-
           <?php echo $filasR ['HORA_ENTREGA']  ?>
          </td>

           <td>
          
           <?php echo $filasR ['st_lavado']  ?>
          </td>
   


      <td> 
          <a href="crud_produccion/apendiente.php?id=<?php echo $filasR['ID_DETALLE']?>&io=<?php echo $filasR['ID_ORD']?>" class="btn btn-primary"> 
          <span class="icon-checkmark"></span>
          </a> 


      </td>
      </tr>
    <?php } ?>


    
    
  </tbody>
</table>
