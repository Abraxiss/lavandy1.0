<?php include('includes/session.php'); ?>
<?php include('includes/header_datatables.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>



<div style="padding: 40px ;"> </div>


  <button style="float: right;margin-top: 20px;"  type="button" class="btn btn-success" data-toggle="modal" data-target="#buscar" > 
    <span class="icon-price-tags"></span> BUSCAR ORDEN
  </button>


<br>

	<?php 
	$queryR="
  SELECT ordenes.TOTAL_VTA, ordenes.ID_ORD, ordenes.N_ORD, clientes.NOMBRE, clientes.TELEFONO, clientes.ID_CLIENTE, ordenes.FECHA_INICIO, ordenes.HORA_INICIO, ordenes.FECHA_ENTREGA, ordenes.HORA_ENTREGA, ordenes.SALDO, ordenes.ID_TIENDA, tiendas.ABREV, tiendas.TIENDA, ordenes.OBS_ORD, estatus_orden.ST_ORD, detallesdeord.CANTIDA, detallesdeord.DESCRIPCION, detallesdeord.COLOR, detallesdeord.PRECIO_UNITARIO, detallesdeord.PRECIO_TOTAL
FROM (((clientes RIGHT JOIN ordenes ON clientes.ID_CLIENTE = ordenes.ID_CLIENTE) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN estatus_orden ON ordenes.STATUS_ORD = estatus_orden.ID_ST_ORD) INNER JOIN detallesdeord ON ordenes.ID_ORD = detallesdeord.ID_ORD
WHERE (((ordenes.ID_TIENDA)='$idtiendaup'))
ORDER BY ordenes.ID_ORD DESC;

";
	$resultR=mysqli_query($conexion, $queryR);
 	




	?>


    <!--Ejemplo tabla con DataTables-->
                    

<table id="example" class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">#ORDEN</th>
      <th scope="col">PRENDAS</th>
      <th scope="col">IMPORTE</th>
      <th scope="col">ESTADO</th>
      <th scope="col">FECHA</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">ENTREGA</th>
      
      
    </tr>
  </thead>
  <tbody>
   
    	<?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr>       
      <td >
<a href="crud_diario/create_vta.php?ido=<?php echo $filasR ['ID_ORD']?>" class="btn btn-primary " style="color: white;">
<?php 
$OBS = $filasR ['OBS_ORD'];
if ($OBS=="" ) {
 ?> <span class="icon-price-tag"></span> &nbsp <?php  
echo " " . $filasR ['ABREV'];  echo "-" . $filasR ['N_ORD'] ;  
} else {
 ?> <span class="icon-eye"></span> &nbsp <?php  
echo " " . $filasR ['ABREV'];  echo "-" . $filasR ['N_ORD'] ;  

}
 ?>     
</a>
      </td>

      <td> 
<?php echo $filasR ['CANTIDA']  ?>
         - <?php echo $filasR ['DESCRIPCION']  ?>
- <?php echo $filasR ['COLOR']  ?>
      </td>

       <td>P/U: <?php echo $filasR ['PRECIO_UNITARIO']  ?>
         <br>P/T: <?php echo $filasR ['PRECIO_TOTAL']  ?>
      </td>   
        
      <td>
        <?php echo $filasR ['ST_ORD']  ?> 
      </td>
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


			</tr>
    <?php } ?>
  
  </tbody>
</table>
                    

<!-- Modal -->
<div class="modal fade" id="buscar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar orden de servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-2">
  <form action="buscaord.php" method="post"> 


    <div class="form-group">
      <label for="orden">Ingrese el Numero de orden</label>
      <input type="number" class="form-control" id="orden" name="orden" required>
    </div>


    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">BUSCAR</button>
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
  

<?php include('includes/footer_datatables.php'); ?>