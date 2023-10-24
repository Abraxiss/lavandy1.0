<?php include('includes/session.php'); ?>
<?php include('includes/header_datatables.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<div style="padding: 40px ;"> </div>


<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ncliente" >
  <span class="icon-user"></span> NUEVO CLIENTE 
</button>

<!-- Modal -->
<div class="modal fade" id="ncliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-2">
  <form action="crud_clientes/create.php" method="post"> 

  	<input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
  	<input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >

    <div class="form-row">
      <div class="col">
      <label for="n_cliente">NOMBRE DEL CLIENTE</label>
      <input type="text" class="form-control" id="n_cliente" name="n_cliente" required>
      </div>
      <div class="col">
      <label for="sexo">SEXO </label>
          <select class="custom-select" id="sexo" name="sexo" required>
          <option selected > </option>
          <option value="M" > MASCULINO </option>         
          <option value="F" > FEMENINO </option>
          </select>

        </div>
    </div>

    <div class="form-row">
      <div class="col">
      <label for="telefono">TELEFONO</label>
      <input type="number" class="form-control" id="telefono" name="telefono" required>
      </div>
      <div class="col">
      <label for="dniruc">DNI O RUC</label>
      <input type="number" class="form-control" id="dniruc" name="dniruc" >
        </div>
    </div>

    <div class="form-row"> 
    <div class="col">
      <label for="direccion">DIRECCION</label>
      <input type="text" class="form-control" id="direccion" name="direccion" >
    </div>

    <div class="col">
      <label for="link_u">LINK DE UBICACION</label>
      <input type="text" class="form-control" id="link_u" name="link_u" >
    </div>
    </div>

    <div class="form-row">
    <div class="col">
		<label for="id_perfume">AROMA PREFERIDO</label>
    <select class="custom-select" id="id_perfume" name="id_perfume" >
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



    <div class="col">
      <label for="calificacion">CALIFICACION A CLIENTE</label>
          <select class="custom-select" id="calificacion" name="calificacion" required>
          <option selected > </option>
          <option value="1" >  ☆ </option>         
          <option value="2" > ☆☆ </option>
          <option value="3" >  ☆☆☆ </option>         
          <option value="4" > ☆☆☆☆ </option>
          <option value="5" >  ☆☆☆☆☆ </option>         
          
          </select>

          </div>
    </div>

    <div class="form-group">
      <label for="comentario">COMENTARIO DE CALIFICACION</label>
      <input type="text" class="form-control" id="comentario" name="comentario" >
    </div>


    <div class="form-group">
      <label for="referidos">REFERIDOS</label>
      <input type="text" class="form-control" id="referidos" name="referidos" >
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
	$queryR="SELECT clientes.*, tiendas.TIENDA, tiendas.ABREV, perfume.PERFUME, clientes.ID_CLIENTE
FROM (clientes INNER JOIN tiendas ON clientes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN perfume ON clientes.AROMA_PREFERIDO = perfume.ID_PERFUME
ORDER BY clientes.ID_CLIENTE DESC
";
	$resultR=mysqli_query($conexion, $queryR);
 	


	?>



<table id="example" class="table table-striped " style="font-size: 0.7em;">
  <thead  class="thead-dark">
    <tr>
   
      
      <th scope="col">NOMBRE</th>
      
      <th scope="col">
        <span class="icon-home3 "></span> 
      <span class="icon-star-full "></span></th>
      <th scope="col">TELEFONO</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
   
    	<?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr> 
     

      <th scope="row">
  
        <?php echo $filasR ['NOMBRE']  ?>  
      <br>


        <a style="color:yellow;" target="_blank" href="<?php echo $filasR ['LINK_UBICACION']  ?>"> 
        <span class="icon-location"></span>        
        <?php echo $filasR ['DIRECCION']  ?></a>  
      	  	 
      </th>

      <td> <span class="icon-home3"> </span>  
           <?php echo $filasR ['ABREV']  ?>
        <br>
           <span class="icon-star-full "> </span>  
           <?php echo $filasR ['CALIFICACION_CLIENTE']  ?>
      </td>

      <td>
          <a href="tel:+51<?php echo $filasR ['TELEFONO'] ?>" class="btn 
          btn-primary btn-sm "  target="_blank"> 
          <span class="icon-phone "></span>
         <?php echo $filasR ['TELEFONO']  ?> </a>        
      </td>


      <td> 
					<a href="clientes_update.php?id=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-primary btn-sm"> 
					<span class="icon-checkmark"></span>
	      	</a> 
					<a href="ordenes_create.php?idc=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-dark btn-sm"> 
					<span class="icon-price-tags"></span>
	      	</a> 
          <a href="https://api.whatsapp.com/send?phone=51<?php echo $filasR ['TELEFONO'] ?>" class="btn btn-success btn-sm" target="_blank"> 
             <span class="icon-bubbles"></span>
          </a>
	      	<a href="mensajes_enviar.php?id_cliente=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-success btn-sm"> 
					<span class="icon-whatsapp"></span>
	      	</a>
          <a href="historialxcliente.php?id=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-secondary btn-sm"> 
          <span class="icon-star-full"></span>
          </a>
      </td>
			</tr>
    <?php } ?>


    
    
  </tbody>
</table>



<?php include('includes/footer_datatables.php'); ?>