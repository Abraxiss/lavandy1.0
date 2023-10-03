<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>

<?php 


if (isset($_GET['id'])) {
$ID_ORD=$_GET['id'];

  $queryo="SELECT ordenes.ID_ORD, ordenes.*, usuarios.user_nick, tiendas.ABREV, clientes.NOMBRE, clientes.TELEFONO, clientes.DIRECCION, tipolavados.LAVADO, perfume.PERFUME, forma_pagos.FORMAPAGO
FROM (((((ordenes INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN perfume ON ordenes.ID_PERFUME = perfume.ID_PERFUME) INNER JOIN clientes ON ordenes.ID_CLIENTE = clientes.ID_CLIENTE) INNER JOIN tipolavados ON ordenes.ID_LAVADO = tipolavados.ID_LAVADO) INNER JOIN usuarios ON ordenes.ID_USER = usuarios.id_user) LEFT JOIN forma_pagos ON ordenes.FORMA_PAGO = forma_pagos.ID_FP
WHERE (((ordenes.ID_ORD)='$ID_ORD'))";
  $resulto=mysqli_query($conexion, $queryo);
$filaso=mysqli_fetch_assoc($resulto);

}
?>


<!-- CARD -->
<div class="card text-center">
  <div class="card-header">
    <h5>
    <span class="icon-price-tags"></span> ORDEN | <?php echo $filaso ['user_nick']?> | <?php echo $filaso ['ABREV']?>-<?php echo $filaso ['N_ORD']?> 
    </h5>

      <div style="text-align: right;">
  <a href="crud_ordenes/ord_delete.php?id=<?php echo $ID_ORD ?>" style="color: red;">
    <span class="icon-bin "></span> Eliminar Orden
  </a>
</div>

  </div>

  <div class="card-body">
<div class="card-group">
  <div class="card ">
    
      <h5 class="card-title">
<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#morden" >
  <span class="icon-price-tags"></span> <?php echo $filaso ['ABREV']?>-<?php echo $filaso ['N_ORD']?>
</button>

      </h5>

      <table class="table table-sm table-striped">
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
      <th scope="row">STATUS</th>
      <td><?php echo $filaso ['STATUS_ORD']?></td>
    </tr>
  </tbody>
</table>

  </div>


  <div class="card">
    
      <h5 class="card-title">
<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#iorden" >
 <span class=" icon-coin-dollar"></span> IMPORTES
</button>
      </h5>


      
       <table class="table table-sm table-striped">
  <tbody>
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


    <tr>
      <th scope="row">FORMA DE PAGO</th>
      <td><?php echo $filaso ['FORMAPAGO']?></td>
    </tr>
  </tbody>
</table>
    
  </div>

</div>
    
  </div>
  <div class="card-footer text-muted">
    <button  type="button" class="btn btn-success  btn-block" data-toggle="modal" data-target="#odetalle" >
     <span class=" icon-plus"></span> NUEVO ITEM
    </button>
  </div>
</div>

<!-- CARD -->

<br>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="odetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Item </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-2">
  <form action="crud_ordenes/create_detalle.php" method="post"> 

  	<input value="<?php echo $ID_ORD ?>" id="id_ord" name="id_ord" type="hidden" >
  	
 <div class="form-row">
    <div class="col">
    <label for="tipo_vta ">TIPO DE VENTA</label>
    <select class="custom-select" id="tipo_vta" name="tipo_vta" required>
    <option selected></option>
    <option value="KILO" > KILOS</option>
    <option value="UNIDA" > UNIDAD</option>
    </select>
    </div>

    <div class="col">
      <label for="cantidad">CANTIDAD</label>
      <input type="number" step="any" class="form-control" id="cantidad" name="cantidad" required>
    </div>

</div>


    <div class="form-group">
      <label for="descripcion">DESCRIPCION</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" required>
    </div>

<div class="form-row">
    <div class="col">
		<label for="color">COLOR</label>
    <select class="custom-select" id="color" name="color" required>
    <option selected></option>
    <option value=" Amarillo claro" > Amarillo claro</option>
    <option value=" Amarillo oscuro" > Amarillo oscuro</option>
    <option value=" Azul claro" > Azul claro</option>
    <option value=" Azul oscuro" > Azul oscuro</option>
    <option value=" Beige claro" > Beige claro</option>
    <option value=" Beige oscuro" > Beige oscuro</option>
    <option value=" Blanco " > Blanco </option>
    <option value=" Celeste claro" > Celeste claro</option>
    <option value=" Celeste oscuro" > Celeste oscuro</option>
    <option value=" Dorado claro" > Dorado claro</option>
    <option value=" Dorado oscuro" > Dorado oscuro</option>
    <option value=" Gris claro" > Gris claro</option>
    <option value=" Gris oscuro" > Gris oscuro</option>
    <option value=" Marrón claro" > Marrón claro</option>
    <option value=" Marrón oscuro" > Marrón oscuro</option>
    <option value=" Morado claro" > Morado claro</option>
    <option value=" Morado oscuro" > Morado oscuro</option>
    <option value=" Naranja claro" > Naranja claro</option>
    <option value=" Naranja oscuro" > Naranja oscuro</option>
    <option value=" Negro " > Negro </option>
    <option value=" Plateado claro" > Plateado claro</option>
    <option value=" Plateado oscuro" > Plateado oscuro</option>
    <option value=" Rojo claro" > Rojo claro</option>
    <option value=" Rojo oscuro" > Rojo oscuro</option>
    <option value=" Rosa claro" > Rosa claro</option>
    <option value=" Rosa oscuro" > Rosa oscuro</option>
    <option value=" Turquesa claro" > Turquesa claro</option>
    <option value=" Turquesa oscuro" > Turquesa oscuro</option>
    <option value=" Varios" > Varios Colores</option>
    <option value=" Verde claro" > Verde claro</option>
    <option value=" Verde oscuro" > Verde oscuro</option>
    <option value=" Violeta claro" > Violeta claro</option>
    <option value=" Violeta oscuro" > Violeta oscuro</option>
    <option value="plomo claro" >plomo claro</option>
    <option value="plomo oscuro" >plomo oscuro</option>
  	</select>

		</div>
    <div class="col">
		<label for="status_prod ">ESTADO :</label>
    <select class="custom-select" id="status_prod" name="status_prod" required>
    <option selected></option>
    <option value="O" > OPTIMO</option>
    <option value="R" > REGULAR</option>
    <option value="B" > BAJO</option>
  	</select>
		</div>
</div>

<div class="form-group">
      <label for="precio_unitario">PRECIO UNITARIO</label>
      <input type="number" step="any" class="form-control" id="precio_unitario" name="precio_unitario" required>
 </div>


    <div class="form-group">
      <label for="observacion_dtll">OBSERVACIÓN ADICIONAL</label>
      <input type="text" class="form-control" id="observacion_dtll" name="observacion_dtll" >
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
<!-- tabla -->
	<?php 
	$queryD="SELECT detallesdeord.*, detallesdeord.ID_ORD
FROM detallesdeord
WHERE (((detallesdeord.ID_ORD)='$ID_ORD'))
";
	$resultD=mysqli_query($conexion, $queryD);
 	
	?>

<table class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      
      <th scope="col">CANTIDA</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">ALCANCE</th>
      <th scope="col">P/U</th>
      <th scope="col">TOTAL</th>
      <th scope="col">OPCIONES</th>
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
      <td>( <?php echo $filasD ['STATUS_PROD']  ?> )
          <br><?php echo $filasD ['COLOR']  ?>
      </td>
      <td><?php echo $filasD ['PRECIO_UNITARIO']  ?> 
           
           
      </td>
      <td><?php echo $filasD ['PRECIO_TOTAL']  ?> 
           
      </td>

            <td> 
          <a href="crud_ordenes/item_delete.php?id=<?php echo $filasD ['ID_DETALLE']?>&io=<?php echo $ID_ORD ?>" class="btn btn-danger" > 
          <span class="icon-bin"></span>
          </a> 


      </td>


      </tr>
    <?php } ?>


    
    
  </tbody>
</table>



<!-- Modal actualisa orden-->
<div class="modal fade" id="morden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar orden de servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-2">
  <form action="crud_ordenes/update_ord.php" method="post"> 
    <input value="<?php echo $ID_ORD ?>" id="id_ord" name="id_ord" type="hidden" >
        <input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
    <input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >
        
    <div class="form-group">
      <label for="n_ord">Número de Orden:</label>
      <input type="number" value="<?php echo $filaso ['N_ORD']?>" class="form-control" id="n_ord" name="n_ord" required>
    </div>


    <div class="form-group">
    <label for="id_cliente">Cliente:</label>
    <select class="custom-select" id="id_cliente" name="id_cliente" required>
    <option selected value="<?php echo $filaso ['ID_CLIENTE']?>" ><?php echo $filaso ['NOMBRE']?></option>
    <?php 
      $query="SELECT *FROM clientes ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_CLIENTE']?>" >
      <?php echo $filas ['TELEFONO']  ?>  <?php echo $filas ['NOMBRE']  ?>
    </option>
    <?php } ?>

    </select>
    </div>

    <div class="form-row">
      <div class="col">
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" value="<?php echo $filaso ['FECHA_INICIO']?>" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
      </div>
      <div class="col">
        <label for="hora_inicio">Hora de Inicio:</label>
        <input type="time" value="<?php echo $filaso ['HORA_INICIO']?>" class="form-control" id="hora_inicio" name="hora_inicio" required>
        </div>
    </div>



 <div class="form-row">
      <div class="col">
      <label for="fecha_entrega">Fecha de Entrega:</label>
      <input type="date" value="<?php echo $filaso ['FECHA_ENTREGA']?>" class="form-control" id="fecha_entrega" name="fecha_entrega" required>
      </div>

      <div class="col">
      <label for="hora_entrega">Hora de Entrega:</label>
      <input type="time" value="<?php echo $filaso ['HORA_ENTREGA']?>" class="form-control" id="hora_entrega" name="hora_entrega" required>
      </div>
</div>

<div class="form-row">
    <div class="col">
    <label for="id_lavado">Tipo de lavado:</label>
    <select class="custom-select" id="id_lavado" name="id_lavado" required>
    <option selected value="<?php echo $filaso ['ID_LAVADO']?>" ><?php echo $filaso ['LAVADO']  ?></option>
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
    <option selected value="<?php echo $filaso ['ID_PERFUME']?>"><?php echo $filaso ['PERFUME']  ?></option>
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
    <label for="adomicilio">Entrega a Domicilio:</label>
    <select class="custom-select" id="adomicilio" name="adomicilio" required>
    <option selected value="<?php echo $filaso ['ADOMICILIO']?>"> <?php echo $filaso ['ADOMICILIO']  ?> </option>
    <option value="si" > si </option>         
    <option value="no" > no </option>
    </select>
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


<!-- Modal actualiza importe -->
<div class="modal fade" id="iorden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">IMPORTES:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-2">
  <form action="crud_diario/update_vta.php" method="post"> 
    <input value="<?php echo $ID_ORD ?>" id="id_ord" name="id_ord" type="hidden" >
    <input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
    <input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >

    <div class="form-group">
      <label for="precio">PRECIO TOTAL</label>
      <input type="number" value="<?php echo $filaso ['PRECIO']?>" class="form-control" id="precio" name="precio" readonly="readonly">
    </div>

    <div class="form-group">
      <label for="total_descuento">DESCUENTO</label>
      <input type="number" value="<?php echo $filaso ['TOTAL_DESCUENTO']?>" class="form-control" id="total_descuento" name="total_descuento" required>
    </div>

    <div class="form-group">
      <label for="acta">IMPORTE A CUENTA</label>
      <input type="number" value="<?php echo $filaso ['ACTA']?>" class="form-control" id="acta" name="acta" required>
    </div>


    <div class="form-row">

        <div class="col">
        <label for="cancelacion">CANCELACION</label>
      <input type="number" value="<?php echo $filaso ['CANCELACION']?>" class="form-control" id="cancelacion" name="cancelacion" >
        </div>    

        <div class="col">
        <label for="fecha_cancelacion">FECHA DE CANCELACION</label>
        <input type="date" class="form-control" id="fecha_cancelacion" name="fecha_cancelacion" >
      </div>

    </div>

    <div class="form-group">
    <label for="forma_pago">FORMA DE PAGO</label>
    <select class="custom-select" id="forma_pago" name="forma_pago" required>
    <option selected value="<?php echo $filaso ['FORMA_PAGO']?>"><?php echo $filaso ['FORMAPAGO']  ?></option>
    <?php 
      $query="SELECT *FROM forma_pagos ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_FP']?>" >
      <?php echo $filas ['FORMAPAGO']  ?>
    </option>
    <?php } ?>

    </select>
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
<?php include('includes/footer.php'); ?>