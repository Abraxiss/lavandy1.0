<?php include('includes/session.php'); ?>

<?php include('includes/header_datatables.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>



<div style="padding: 40px ;"> </div>

<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#norden" >
  <span class="icon-price-tags"></span> NUEVA ORDEN
</button>

<!-- Modal -->
<div class="modal fade" id="norden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva orden de servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-2">
  <form action="crud_ordenes/create.php" method="post"> 

  	<input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
  	<input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >
        
		<div class="form-group">
      <label for="n_ord">Número de Orden:</label>
      <input type="number" class="form-control" id="n_ord" name="n_ord" required>
    </div>


    <div class="form-row">
     <div class="col-10"> 
		<label for="id_cliente">Cliente:</label>
    <input class="form-control" list="cliente" id="id_cliente" name="id_cliente" required>
    <datalist id="cliente" >
    <option selected></option>
    <?php 
      $query="SELECT *FROM clientes ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_CLIENTE']?>" >
      <?php echo $filas ['TELEFONO']  ?>  <?php echo $filas ['NOMBRE']  ?>
    </option>
    <?php } ?>

  	</datalist>
		</div>
<div class="col">
    <a href="clientes_read.php" class="btn btn-block btn-warning " style="margin-top: 30px;"> 
        <span class="icon-user-plus"></span>
    </a> 
</div>

<br>
    </div>
    <div class="form-row">
      <div class="col">
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input  type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $fecha_serv ; ?>" required>
      </div>
      <div class="col">
        <label for="hora_inicio">Hora de Inicio:</label>
				<input value="" type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
				</div>
    </div>



 <div class="form-row">
    	<div class="col">
      <label for="fecha_entrega">Fecha de Entrega:</label>
      <input  type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" required>
    	</div>

    	<div class="col">
      <label for="hora_entrega">Hora de Entrega:</label>
      <input type="time" class="form-control" id="hora_entrega" name="hora_entrega" required>
    	</div>
</div>

<div class="form-row">
    <div class="col">
		<label for="id_lavado">Tipo de lavado:</label>
    <select class="custom-select" id="id_lavado" name="id_lavado" required>
    <option selected></option>
    <?php 
      $query="SELECT *FROM tipolavados ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_LAVADO']?>" >
      <?php echo $filas ['LAVADO']  ?>
    </option>
    <?php } ?>

  	</select>
		</div>


    <div class="col">
		<label for="id_perfume">Perfume:</label>
    <select class="custom-select" id="id_perfume" name="id_perfume" required>
    <option selected></option>
    <?php 
      $query="SELECT *FROM perfume ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_PERFUME']?>" >
      <?php echo $filas ['PERFUME']  ?>
    </option>
    <?php } ?>

  	</select>
		</div>
</div>


<div class="form-row">
    <div class="col">
		<label for="adomicilio">Entrega a Domicilio:</label>
    <select class="custom-select" id="adomicilio" name="adomicilio" required>
    <option selected> </option>
    <option value="si" > si </option>         
    <option value="no" > no </option>
   	</select>
		</div>
    <div class="col">
    <label for="horarios_movil">Horario Traslado:</label>
    <select class="custom-select" id="horarios_movil" name="horarios_movil" required>
    <option selected></option>
    <?php 
      $query="SELECT *FROM  horarios_movil ";
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

    <div class="form-group">
      <label for="obs_ord">OBSERVACION</label>
      <input type="text" class="form-control" id="obs_ord" name="obs_ord" >
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

<br>

	<?php 
	$queryR="SELECT ordenes.TOTAL_VTA, ordenes.ID_ORD, ordenes.N_ORD, clientes.NOMBRE, clientes.TELEFONO , clientes.ID_CLIENTE, ordenes.FECHA_INICIO, ordenes.HORA_INICIO, ordenes.FECHA_ENTREGA, ordenes.HORA_ENTREGA, ordenes.SALDO, ordenes.ID_TIENDA, tiendas.ABREV, tiendas.TIENDA
FROM (clientes INNER JOIN ordenes ON clientes.ID_CLIENTE = ordenes.ID_CLIENTE) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA
WHERE (((ordenes.ID_TIENDA)='$idtiendaup'))
ORDER BY ordenes.ID_ORD DESC ";
	$resultR=mysqli_query($conexion, $queryR);
 	




	?>


    <!--Ejemplo tabla con DataTables-->
                    

<table id="example" class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">#ORD</th>
      <th scope="col">FECHA</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">ENTREGA</th>
      <th scope="col">IMPORTE</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
   
    	<?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr>       
      <th scope="row"><?php echo $filasR ['ABREV']  ?>-<?php echo $filasR ['N_ORD']  ?>
      </th>
      <td>
        <?php echo $filasR ['FECHA_INICIO']  ?> 
      	<br><?php echo $filasR ['HORA_INICIO']  ?>
      </td>
      <td><?php echo $filasR ['TELEFONO']  ?>
      	<br><?php echo $filasR ['NOMBRE']  ?>
      </td>
      <td><?php echo $filasR ['FECHA_ENTREGA']  ?>
      	 <br><?php echo $filasR ['HORA_ENTREGA']  ?>
      </td>
      <td>TOTAL: <?php echo $filasR ['TOTAL_VTA']  ?>
      	 <br>SALDO: <?php echo $filasR ['SALDO']  ?>
      </td>
      <td> 

        <a href="crud_diario/create_vta.php?ido=<?php echo $filasR ['ID_ORD']?>" class="btn btn-primary"> 
          <span class="icon-checkmark"></span>
          </a>

	      	<a href="mensajes_enviar.php?id_cliente=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-success"> 
					<span class="icon-whatsapp"></span>
	      	</a>

      </td>
			</tr>
    <?php } ?>
  
  </tbody>
</table>
                    


  

<?php include('includes/footer_datatables.php'); ?>