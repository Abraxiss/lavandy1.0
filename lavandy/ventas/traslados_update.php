<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>


<center>  
<div class="card text-white bg-primary mb-3" style="max-width: 100%;">
  <div class="card-body">
   <h5>ACTUALIZAR ORDEN DE TRASLADO</h5> 
  </div>
</div>
</center>
<br><br>


<?php 
 $id = $_GET['id'];
  $queryR="SELECT * FROM vista_traslados
  WHERE ID_TRASLADO ='$id' ";
  $resultR=mysqli_query($conexion, $queryR);
  $filasR=mysqli_fetch_assoc($resultR);

  ?>
<div class="container">
  <div class="row">
    <div class="col-sm">
      
    </div>
    <div class="col-sm-8">
      
   <form action="crud_traslados/create.php" method="post"> 

    <input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
    <input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >

    <div class="form-row">
      <div class="col">
      <label for="tipo_traslado">  TIPO TRASLADO </label>
      <select class="custom-select" id="tipo_traslado" name="tipo_traslado" >
      <option selected value="<?php echo $filasR ['TIPO_TRASLADO']?>" ><?php echo $filasR ['TIPO_TRASLADO_DESC']?></option>
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
  

    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">GUARDAR</button>
  </form>

    </div>
    <div class="col-sm">
    </div>
  </div>
</div>




<?php include('includes/footer.php'); ?>