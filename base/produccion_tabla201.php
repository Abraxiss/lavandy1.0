<?php  
  $queryR="

SELECT detallesdeord.ID_DETALLE, detallesdeord.ID_ORD, tiendas.ABREV, ordenes.N_ORD, detallesdeord.DESCRIPCION, ordenes.FECHA_ENTREGA, ordenes.HORA_ENTREGA, detallesdeord.STADO_LAVADO, estatus_lavado.st_lavado, procesos.ID_PROCESO AS ÚltimoDeID_PROCESO, secuencias.SECUENCIA AS ÚltimoDeSECUENCIA, procesos.F_INICIO AS ÚltimoDeF_INICIO, procesos.H_INICIO AS ÚltimoDeH_INICIO, procesos.T_ESTIMADO AS T_ESTIMADO
FROM ((((detallesdeord 
INNER JOIN ordenes ON detallesdeord.ID_ORD = ordenes.ID_ORD) 
INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA) 
INNER JOIN estatus_lavado ON detallesdeord.STADO_LAVADO = estatus_lavado.id_st_lavado) 
INNER JOIN procesos ON detallesdeord.ID_DETALLE = procesos.ID_ORD_DTLL) 
INNER JOIN secuencias ON procesos.ID_SECUENCIA = secuencias.ID_SECUENCIA
WHERE detallesdeord.STADO_LAVADO = 2
AND procesos.ID_PROCESO = (SELECT MAX(p.ID_PROCESO) FROM procesos p WHERE p.ID_ORD_DTLL = detallesdeord.ID_DETALLE)
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
      <th scope="col">PROCESO</th>

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
          
           <?php echo $filasR ['st_lavado']  ?> <br>
           <?php echo $filasR ['ÚltimoDeSECUENCIA']  ?>
           <?php 
            $query="SELECT *FROM procesos ";
            $result=mysqli_query($conexion, $query);
            $filas=mysqli_fetch_assoc($result)
            ?>
   

          </td>
   


      <td> 
          <a href="procesos_create.php?id=<?php echo $filasR['ID_DETALLE']?>&io=<?php echo $filasR['ID_ORD']?>" class="btn btn-primary">
          <span class="icon-clock2 "></span> 
          <?php echo $filasR ['ÚltimoDeH_INICIO']  ?>
          <span class="icon-history"></span>
          <?php echo $filasR ['T_ESTIMADO']  ?>
          
          </a> 


      </td>
      </tr>
    <?php } ?>


    
    
  </tbody>
</table>

