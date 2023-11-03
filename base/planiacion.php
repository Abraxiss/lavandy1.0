<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>


<!-- CARD -->
<div class="card text-center">
  <div class="card-header">
    <B><h4>
    <span class="icon-cogs"> </span>
      PLANIACIÓN DE PROCESOS
    </B></h4>


</div>

  </div>
</div>

<br>  




<!-- tabla detalles de orden -->
  <?php 
  $queryD="
SELECT detallesdeord.*, detallesdeord.ID_ORD, secuencias.SECUENCIA, ordenes.STATUS_LAVADO, tiendas.ABREV, ordenes.N_ORD, ordenes.OBS_ORD
FROM ((detallesdeord LEFT JOIN secuencias ON detallesdeord.ID_SECUENCIA = secuencias.ID_SECUENCIA) INNER JOIN ordenes ON detallesdeord.ID_ORD = ordenes.ID_ORD) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA
WHERE (((ordenes.STATUS_LAVADO)=3));



";
  $resultD=mysqli_query($conexion, $queryD);


  ?>
<h4> Detalle de Prendas</h4>
<table class="table table-striped table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#ORDEN</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">ALCANCE</th>
      <th scope="col">SECUENCIA</th>
      <th scope="col">PEN</th>
      <th scope="col">PRE</th>
      <th scope="col">LVD</th>
      <th scope="col">SCD</th>
      <th scope="col">PCH</th>
      <th scope="col">DOB</th>
      <th scope="col">RLV</th>
      <th scope="col">FIN</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($filasD = mysqli_fetch_assoc($resultD)) { ?>
      <tr>
        <th >
          <a href="ordenes_detalle.php?id=<?php echo $filasD ['ID_ORD']?>" class="btn btn-primary " style="color: white;">
          <?php 
          $OBS = $filasD ['OBS_ORD'];
          if ($OBS=="" ) {
           ?> <span class="icon-price-tag"></span> &nbsp <?php  
          echo " " . $filasD ['ABREV'];  echo "-" . $filasD ['N_ORD'] ;  
          } else {
           ?> <span class="icon-eye"></span> &nbsp <?php  
          echo " " . $filasD ['ABREV'];  echo "-" . $filasD ['N_ORD'] ;  

          }
           ?>     
          </a>
        </th>
        <th ><?php echo $filasD['CANTIDA'] ?> 
          <br><?php echo $filasD['TIPO_VTA'] ?>
        </th>
        <td><?php echo $filasD['DESCRIPCION'] ?>
          <br><?php echo $filasD['OBSERVACION_DTLL'] ?>
        </td>
        <td><?php echo $filasD['COLOR'] ?> (<?php echo $filasD['STADO_PREN'] ?>)</td>
        <td>
            <a href="procesos_read.php?id=<?php echo $filasD['ID_DETALLE']?>" class="btn btn-dark btn-sm">
            <?php echo $filasD['SECUENCIA'] ?>
            </a>
        </td>

 <td>
            <?php if ($filasD['PENDIENTE']==1) {
              $COLOR='btn-danger';
            } else {
              $COLOR='btn-secondary';
            }
             ?>
            <a href="crud_procesos/create2.php?id=<?php echo $filasD['ID_DETALLE']?>&io=<?php echo $filasD['ID_ORD']?>&s=1" class="btn <?php echo $COLOR?> btn-sm">
             
                <span class="icon-hour-glass"></span>
            </a>
          </td>

          <td>
            <?php if ($filasD['PRELAVADO']==1) {
              $COLOR1='btn-primary';
            } else {
              $COLOR1='btn-secondary';
            }
             ?>
            <a href="crud_procesos/create2.php?id=<?php echo $filasD['ID_DETALLE']?>&io=<?php echo $filasD['ID_ORD']?>&s=2" class="btn <?php echo $COLOR1?> btn-sm">
              
                <span class="icon-spinner4"></span>
            </a>
          </td>

          <td>
            <?php if ($filasD['LAVADO']==1) {
              $COLOR='btn-success';
            } else {
              $COLOR='btn-secondary';
            }
             ?>
            <a href="crud_procesos/create2.php?id=<?php echo $filasD['ID_DETALLE']?>&io=<?php echo $filasD['ID_ORD']?>&s=3" class="btn <?php echo $COLOR?> btn-sm">
              
                <span class="icon-cog"></span>
            </a>
          </td>

          <td>
            <?php if ($filasD['SECADO']==1) {
              $COLOR3='btn-danger';
            } else {
              $COLOR3='btn-secondary';
            }
             ?>
            <a href="crud_procesos/create2.php?id=<?php echo $filasD['ID_DETALLE']?>&io=<?php echo $filasD['ID_ORD']?>&s=4" class="btn <?php echo $COLOR3?> btn-sm">
               
                <span class="icon-fire"></span>
            </a>
          </td>          
          <td>
            <?php if ($filasD['PLANCHADO']==1) {
              $COLOR3='btn-warning';
            } else {
              $COLOR3='btn-secondary';
            }
             ?>
            <a href="crud_procesos/create2.php?id=<?php echo $filasD['ID_DETALLE']?>&io=<?php echo $filasD['ID_ORD']?>&s=5" class="btn <?php echo $COLOR3?> btn-sm">
               
                <span class="icon-shield"></span>
            </a>
          </td>  
          <td>          
 
            <?php if ($filasD['DOBLADO']==1) {
              $COLOR3='btn-info';
            } else {
              $COLOR3='btn-secondary';
            }
             ?>
            <a href="crud_procesos/create2.php?id=<?php echo $filasD['ID_DETALLE']?>&io=<?php echo $filasD['ID_ORD']?>&s=6" class="btn <?php echo $COLOR3?> btn-sm">
               
                <span class="icon-stack"></span>
            </a>
          </td>  
          <td>          
 
            <?php if ($filasD['RELAVADO']==1) {
              $COLOR3='btn-dark';
            } else {
              $COLOR3='btn-secondary';
            }
             ?>
            <a href="crud_procesos/create2.php?id=<?php echo $filasD['ID_DETALLE']?>&io=<?php echo $filasD['ID_ORD']?>&s=7" class="btn <?php echo $COLOR3?> btn-sm">
               
                <span class="icon-reply"></span>
            </a>
          </td> 
          <td>          
 
            <?php if ($filasD['FINALIZADO']==1) {
              $COLOR3='btn-primary';
            } else {
              $COLOR3='btn-secondary';
            }
             ?>
            <a href="crud_procesos/create2.php?id=<?php echo $filasD['ID_DETALLE']?>&io=<?php echo $filasD['ID_ORD']?>&s=8" class="btn <?php echo $COLOR3?> btn-sm">
               
                <span class="icon-checkbox-checked"></span>
            </a>
          </td> 

      </tr>
    <?php } ?>
  </tbody>
</table>



<?php include('includes/footer.php'); ?>

