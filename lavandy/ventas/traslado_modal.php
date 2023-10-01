<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ntras" >
  <span class="icon-truck"></span> NUEVA ORDEN DE TRASLADO  
</button>

<!-- Modal -->
<div class="modal fade" id="ntras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva orden de traslado </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-2">
  <form action="crud_traslados/create.php" method="post"> 

  	<input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
  	<input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >

    <div class="form-row">
      <div class="col">
      <label for="tipo_traslado">  TIPO TRASLADO </label>
      <select class="custom-select" id="tipo_traslado" name="tipo_traslado" >
      <option selected></option>
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
      <option selected></option>
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
      <option selected></option>
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
      <option selected></option>
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
      <option selected></option>
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
      <input type="text" class="form-control" id="obs_traslado" name="obs_traslado" >
    </div>
  

    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">GUARDAR</button>
  </form>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>      
      </div>
    </div>
  </div>
</div>

<!-- Modal -->