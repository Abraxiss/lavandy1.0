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


  <div class="card-body">
<div class="card-group">
  <div class="card ">
    
      <h5 class="card-title">
<!-- Button trigger modal -->

      </h5>

      <table class="table table-sm table-striped ">
  <tbody>
    <tr>
      <th scope="row">CLIENTE</th>
      <td><?php echo $filaso ['NOMBRE']?></td>

    </tr>
    <tr>
      <th scope="row">TELEFONO</th>
      <td><?php echo $filaso ['TELEFONO']?></td>

    </tr>
      <tr>
      <th scope="row">DIRECCION</th>
      <td><?php echo $filaso ['DIRECCION']?></td>

    </tr>
    <tr>
      <th scope="row">LAVADO</th>
      <td><?php echo $filaso ['LAVADO']?></td>

    </tr>
    <tr>
      <th scope="row">PERFUME</th>
      <td><?php echo $filaso ['PERFUME']?></td>
    </tr>

    <tr>
      <th scope="row">FECHA INICIO</th>
      <td><?php echo $filaso ['FECHA_INICIO']?> |<?php echo $filaso ['HORA_INICIO']?></td>
    </tr>

    <tr>
      <th scope="row">FECHA ENTREGA</th>
      <td><?php echo $filaso ['FECHA_ENTREGA']?>|<?php echo $filaso ['HORA_ENTREGA']?></td>
    </tr>
   <tr>
      <th scope="row">A DOMICILIO</th>
      <td><?php echo $filaso ['ADOMICILIO']?></td>
    </tr>

    <tr>
      <th scope="row">OBSERVACION</th>
      <td><?php echo $filaso ['OBS_ORD']?></td>
    </tr>
    <tr>
      <th scope="row">VENDEDOR</th>
      <td><?php echo $filaso ['user_nick']?></td>
    </tr>
    <tr>
      <th scope="row">TIENDA</th>
      <td><?php echo $filaso ['TIENDA']?></td>
    </tr>
  </tbody>
</table>

  </div>


  <div class="card">
    
      <h5 class="card-title">
<!-- Button trigger modal -->

      </h5>


      
       <table class="table table-sm table-striped">
  <tbody>
    <tr>
      <th scope="row">STATUS </th>
      <td><?php echo $filaso ['ST_ORD']?> ( <?php echo $filaso ['ALCANCE']?>) 

      </td>
      
    </tr>
    <tr>
      <th scope="row">LAVADO </th>
      <td><?php echo $filaso ['st_lavado']?> ( <?php echo $filaso ['ALCANCELAVADO']?>) </td>
      
    </tr>
    <tr>
      <th scope="row">TOTAL_KILOS</th>
      <td><?php echo $filaso ['TOTAL_KILOS']?></td>

    </tr>
    <tr>
      <th scope="row">TOTAL_PRENDAS</th>
      <td><?php echo $filaso ['TOTAL_PRENDAS']?></td>

    </tr>
    <tr>
      <th scope="row">PRECIO</th>
      <td><?php echo $filaso ['PRECIO']?></td>
    </tr>
    <tr>
      <th scope="row">DESCUENTO</th>
      <td><?php echo $filaso ['TOTAL_DESCUENTO']?></td>
    </tr>

    <tr>
      <th scope="row">TOTAL_VTA </th>
      <td><?php echo $filaso ['TOTAL_VTA']?> </td>
    </tr>

    <tr>
      <th scope="row">ACTA</th>
      <td><?php echo $filaso ['ACTA']?></td>
    </tr>
    <tr>
      <th scope="row">CANCELACION</th>
      <td><?php echo $filaso ['CANCELACION']?></td>
    </tr>
    <tr>
      <th scope="row">SALDO</th>
      <td><?php echo $filaso ['SALDO']?></td>
    </tr>

  </tbody>
</table>
    
  </div>

</div>
    
  </div>
  <div class="card-footer text-muted">

  </div>
</div>

<!-- CARD -->

<br>


<!-- tabla -->
  <?php 
  $queryD="SELECT detallesdeord.*, detallesdeord.ID_ORD, secuencias.SECUENCIA
FROM detallesdeord LEFT JOIN secuencias ON detallesdeord.ID_SECUENCIA = secuencias.ID_SECUENCIA
WHERE (((detallesdeord.ID_ORD)='$ID_ORD'));

";
  $resultD=mysqli_query($conexion, $queryD);
  
  ?>
<h4> Se recepciona la(s) siguiente(s) prenda(s)</h4>
<table class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      
      <th scope="col">CANTIDA</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">ALCANCE</th>
      <th scope="col">LAVADO</th>
    </tr>
  </thead>
  <tbody>
   
      <?php while($filasD=mysqli_fetch_assoc($resultD)) { ?>
      <tr>       
      <th scope="row"><?php echo $filasD ['CANTIDA']  ?> 
        <br><?php echo $filasD ['TIPO_VTA']  ?>
      </th>

      <td><?php echo $filasD ['DESCRIPCION']  ?>
          <br><?php echo $filasD ['OBSERVACION_DTLL']  ?>
  
      </td>
      <td><?php echo $filasD ['COLOR']  ?> ( <?php echo $filasD ['STADO_PREN']  ?> )
      </td>
      <td><?php echo $filasD ['SECUENCIA']  ?> </td>

      </tr>
    <?php } ?>

  
  </tbody>
</table>




<div class="dropdown-divider"></div>

<?php include('includes/footer.php'); ?>

