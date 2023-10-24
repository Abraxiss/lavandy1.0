<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>

<center>  
<div class="card text-dark bg-secondary mb-3" style="max-width: 100%;">
  <div class="card-body">
   <h5>ACTUALIZAR ORDEN DE TRASLADO</h5> 
  </div>
</div>
</center>
<br><br>




<?php 
 $id = $_GET['id'];
  $queryR="SELECT traslado.ID_TRASLADO, traslado.ID_USER, traslado.ID_TDA, traslado.ID_TIPO_TRASLADO, traslado.ID_HORARIO, traslado.ID_ORD, traslado.ORIGEN_TDA, traslado.FECHA_RECOJO, traslado.DESTINO_TDA, traslado.FECHA_ENTREGA, traslado.OBS_TRASLADO, traslado.ID_STATUS_TRAS, traslado.ANULADO, tipo_traslado.TIPO_TRASLADO, horarios_movil.HORARIO, ordenes.N_ORD, tiendas.ABREV, clientes.NOMBRE, clientes.TELEFONO, clientes.LINK_UBICACION ,clientes.DIRECCION, tiendas_1.TIENDA AS TDAO, tiendas_2.TIENDA AS TDAD, estatus_tras.STATUS_TRAS
FROM (((((((traslado INNER JOIN tipo_traslado ON traslado.ID_TIPO_TRASLADO = tipo_traslado.ID_TIPO) INNER JOIN horarios_movil ON traslado.ID_HORARIO = horarios_movil.ID_HORARIO) INNER JOIN ordenes ON traslado.ID_ORD = ordenes.ID_ORD) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN clientes ON ordenes.ID_CLIENTE = clientes.ID_CLIENTE) INNER JOIN tiendas AS tiendas_1 ON traslado.ORIGEN_TDA = tiendas_1.ID_TIENDA) INNER JOIN tiendas AS tiendas_2 ON traslado.DESTINO_TDA = tiendas_2.ID_TIENDA) INNER JOIN estatus_tras ON traslado.ID_STATUS_TRAS = estatus_tras.ID_STATUS_TRAS
WHERE (((traslado.ID_TRASLADO)='$id')); ";
  $resultR=mysqli_query($conexion, $queryR);
  $filasR=mysqli_fetch_assoc($resultR);




  ?>
<div class="container">
  <div class="row">
    <div class="col-sm">
      
    </div>
    <div class="col-sm-8">
   <div class="card">
  <div class="card-header">
   <span class="icon-truck "></span> ORDEN DE TRASLADO <?php echo $filasR ['ABREV']?>-<?php echo $filasR ['N_ORD']?>
   <div style="text-align: right;">

<?php 
if ($filasR ['ANULADO']=='si') {
  ?>
  <a href="crud_traslados/activar.php?id=<?php echo $id ?>" style="color: blue">
    <span class="icon-checkmark "></span> Activar orden
  </a>
  <?php
} else {
  ?>
  <a href="crud_traslados/anula.php?id=<?php echo $id ?>" style="color: red;">
    <span class="icon-cross"></span> Anular orden
  </a>
  <?php
}

?>




</div>
  </div>
  <div class="card-body">
  
    <div class="form-row">
      <div class="col">
        <h6>Cliente :</h6>
            <a href="tel:+51<?php echo $filasR ['TELEFONO'] ?>" class="btn 
              btn-primary btn-sm " target="_blank"> 
              <span class="icon-phone "></span>
            </a> 
            <?php echo $filasR ['NOMBRE']  ?> 
 
            <br>
              <a href="https://api.whatsapp.com/send?phone=51<?php echo $filasR ['TELEFONO'] ?>" class="btn btn-success btn-sm " target="_blank"> 
              <span class="icon-whatsapp "></span>
              </a>         
             <a target="_blank" href="<?php echo $filasR ['LINK_UBICACION']  ?>"> 
              <span class="icon-location"></span> <?php echo $filasR ['DIRECCION']  ?></a>

      </div>
      <div class="col">

<h6>Alcance :</h6>
<span class="icon-price-tag"></span> <?php echo $filasR ['OBS_TRASLADO']?>
<br>
<span class="icon-road"></span> <?php echo $filasR ['TIPO_TRASLADO']?>
<br>
<span class=" icon-info "></span> Anulado: ( <?php echo $filasR ['ANULADO']?> )

      </div>
    </div>

  </div>
</div>


<br> 
   <form action="crud_traslados/update.php" method="post"> 

    <input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
    <input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >
    <input value="<?php echo $id?>" id="id_tras" name="id_tras" type="hidden" >

    <div class="form-row">
      <div class="col">
      <label for="tipo_traslado">  TIPO TRASLADO </label>
      <select class="custom-select" id="tipo_traslado" name="tipo_traslado" >
      <option selected value="<?php echo $filasR ['ID_TIPO_TRASLADO']?>" ><?php echo $filasR ['TIPO_TRASLADO']?></option>
      <?php 
        $query="SELECT * FROM tipo_traslado ";
        $result=mysqli_query($conexion, $query);
      ?>
      <?php while($filas=mysqli_fetch_assoc($result)) { ?>
        
      <option value="<?php echo $filas ['ID_TIPO']?>" >
        <?php echo $filas ['TIPO_TRASLADO']  ?>
      </option>
      <?php } ?>
      </select>
      </div>

      <div class="col">
      <label for="horarios_movil">  HORARIO </label>
      <select class="custom-select" id="horarios_movil" name="horarios_movil" >
      <option selected value="<?php echo $filasR ['ID_HORARIO']?>" ><?php echo $filasR ['HORARIO']?></option>
      <?php 
        $query="SELECT * FROM horarios_movil";
        $result=mysqli_query($conexion, $query);
      ?>
      <?php while($filas=mysqli_fetch_assoc($result)) { ?>
        
      <option value="<?php echo $filas ['ID_HORARIO']?>" >
        <?php echo $filas ['HORARIO']  ?>
      </option>
      <?php } ?>
      </select>
      </div>
    </div>

    <div class="form-row">
      <div class="col">
      <label for="id_tienda_o">ORIGEN</label>
      <select class="custom-select" id="id_tienda_o" name="id_tienda_o" >
      <option selected value="<?php echo $filasR ['ORIGEN_TDA']?>" ><?php echo $filasR ['TDAO']?></option>
      <?php 
        $query="SELECT * FROM tiendas";
        $result=mysqli_query($conexion, $query);
      ?>
      <?php while($filas=mysqli_fetch_assoc($result)) { ?>
        
      <option value="<?php echo $filas ['ID_TIENDA']?>" >
        <?php echo $filas ['TIENDA']  ?>
      </option>
      <?php } ?>
      </select>
      </div>
      <div class="col">
      <label for="id_ord">ORDEN DE SERVICIO</label>
      <select class="custom-select" id="id_ord" name="id_ord" >
      <option selected value="<?php echo $filasR ['ID_ORD']?>" ><?php echo $filasR ['ABREV']?>-<?php echo $filasR ['N_ORD']?></option>
      <?php 
        $query="SELECT ordenes.ID_ORD, tiendas.ABREV, ordenes.N_ORD, ordenes.STATUS_ORD
          FROM ordenes INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA
          WHERE (((ordenes.STATUS_ORD)<5))";
        $result=mysqli_query($conexion, $query);
      ?>
      <?php while($filas=mysqli_fetch_assoc($result)) { ?>
        
      <option value="<?php echo $filas ['ID_ORD']?>" >
       <?php echo $filas ['N_ORD']  ?> -<?php echo $filas ['ABREV']  ?>
      </option>
      <?php } ?>
      </select>
    </div>
   </div>

    <div class="form-group">
      <label for="id_tienda_d">DESTINO</label>
      <select class="custom-select" id="id_tienda_d" name="id_tienda_d" >
      <option selected value="<?php echo $filasR ['DESTINO_TDA']?>" ><?php echo $filasR ['TDAD']?></option>
      <?php 
        $query2="SELECT * FROM tiendas";
        $result2=mysqli_query($conexion, $query2);
      ?>
      <?php while($filas2=mysqli_fetch_assoc($result2)) { ?>
        
      <option value="<?php echo $filas2 ['ID_TIENDA']?>" >
        <?php echo $filas2 ['TIENDA']  ?>
      </option>
      <?php } ?>
      </select>
    </div>


    <div class="form-group">
      <label for="obs_traslado">OBSERVACION</label>
      <input value="<?php echo $filasR ['OBS_TRASLADO']?>" type="text" class="form-control" id="obs_traslado" name="obs_traslado" >
    </div>
  <br> 

    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">ACTUALIZAR</button>
  </form>

    </div>
    <div class="col-sm">
    </div>
  </div>
</div>




<?php include('includes/footer.php'); ?>