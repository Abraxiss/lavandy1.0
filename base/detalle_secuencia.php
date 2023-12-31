<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>

<?php 

if (isset($_GET['id'])) {
$ID_ORD=$_GET['id'];

  $queryo="
SELECT ordenes.ID_ORD, ordenes.*, usuarios.user_nick, tiendas.ABREV, clientes.NOMBRE, clientes.TELEFONO, clientes.DIRECCION, tipolavados.LAVADO, perfume.PERFUME, forma_pagos.FORMAPAGO, estatus_orden.ST_ORD, tiendas.TIENDA, estatus_lavado.st_lavado, estatus_orden.ALCANCE, estatus_lavado.Alcance AS ALCANCELAVADO
FROM estatus_lavado RIGHT JOIN (((((((ordenes INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN perfume ON ordenes.ID_PERFUME = perfume.ID_PERFUME) INNER JOIN clientes ON ordenes.ID_CLIENTE = clientes.ID_CLIENTE) INNER JOIN tipolavados ON ordenes.ID_LAVADO = tipolavados.ID_LAVADO) INNER JOIN usuarios ON ordenes.ID_USER = usuarios.id_user) LEFT JOIN forma_pagos ON ordenes.FORMA_PAGO = forma_pagos.ID_FP) INNER JOIN estatus_orden ON ordenes.STATUS_ORD = estatus_orden.ID_ST_ORD) ON estatus_lavado.id_st_lavado = ordenes.STATUS_LAVADO
WHERE (((ordenes.ID_ORD)='$ID_ORD'));

;

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




<!-- tabla detalles de orden -->
  <?php 
  $queryD="SELECT detallesdeord.*, detallesdeord.ID_ORD, secuencias.SECUENCIA
FROM detallesdeord LEFT JOIN secuencias ON detallesdeord.ID_SECUENCIA = secuencias.ID_SECUENCIA
WHERE (((detallesdeord.ID_ORD)='$ID_ORD'));

";
  $resultD=mysqli_query($conexion, $queryD);


  ?>
<h4> Detalle de Prendas</h4>
<table class="table table-striped table-sm">
  <thead class="thead-dark">
    <tr>
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
        <th scope="row"><?php echo $filasD['CANTIDA'] ?> 
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


<div class="dropdown-divider"></div>


<br>  




<!-- tabla detalles de orden -->
  <?php 
  $querypo="
SELECT procesos.ID_ORD, detallesdeord.TIPO_VTA, detallesdeord.CANTIDA, detallesdeord.DESCRIPCION, detallesdeord.COLOR, detallesdeord.OBSERVACION_DTLL, secuencias.SECUENCIA, procesos.F_INICIO, procesos.H_INICIO, procesos.T_ESTIMADO, procesos.OBS_PROCESO, detallesdeord.STADO_PREN, metodos.METODO, detallesdeord.ID_DETALLE, procesos.ID_PROCESO
FROM ((secuencias INNER JOIN procesos ON secuencias.ID_SECUENCIA = procesos.ID_SECUENCIA) INNER JOIN detallesdeord ON procesos.ID_ORD_DTLL = detallesdeord.ID_DETALLE) LEFT JOIN metodos ON procesos.ID_METODO = metodos.ID_METODO
WHERE (((procesos.ID_ORD)='$ID_ORD'));


";
  $resultpo=mysqli_query($conexion, $querypo);


  ?>
<h4> Procesos de Lavado</h4>
<table class="table table-striped table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">CANTIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">ALCANCE</th>
      <th scope="col">SECUENCIA</th>
      <th scope="col">METODO</th>
      <th scope="col">INICIO</th>
      <th scope="col">ESTIMADO</th>
      <th scope="col">OBSERVACION</th>
      <th scope="col">EDITAR</th>

    </tr>
  </thead>
  <tbody>
    <?php while ($filaspo = mysqli_fetch_assoc($resultpo)) { ?>
      <tr>
        <th scope="row"><?php echo $filaspo['CANTIDA'] ?> 
          <br><?php echo $filaspo['TIPO_VTA'] ?>
        </th>
        <td><?php echo $filaspo['DESCRIPCION'] ?>
          <br><?php echo $filaspo['COLOR'] ?>
        </td>
        <td>
          <?php echo $filaspo['OBSERVACION_DTLL'] ?> (<?php echo $filaspo['STADO_PREN'] ?>)</td>
        <td>            
            <?php echo $filaspo['SECUENCIA'] ?>            
        </td>
        <td>            
            <?php echo $filaspo['METODO'] ?>            
        </td>
         <td>
 <?php echo $filaspo['F_INICIO'] ?> -  
  <?php echo $filaspo['H_INICIO'] ?> 
          </td>

          <td>
<?php echo $filaspo['T_ESTIMADO'] ?>              
          </td>

          <td>
<?php echo $filaspo['OBS_PROCESO'] ?>              
          </td>
          <td>
          <a href="procesos_create.php?id=<?php echo $filaspo ['ID_DETALLE']  ?>&io=<?php echo $filaspo ['ID_ORD']  ?>&ip=<?php echo $filaspo ['ID_PROCESO']  ?>" class="btn btn-dark"> 
          <span class=" icon-pencil2 "></span>
           
          </td>
  

      </tr>
    <?php } ?>
  </tbody>
</table>




<?php include('includes/footer.php'); ?>

