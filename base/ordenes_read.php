<?php include("includes/session.php"); ?>
<?php include('includes/header_datatables.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>



<div style="padding: 40px ;"> </div>


<br>

	<?php 
	$queryR="SELECT ordenes.TOTAL_VTA, ordenes.ID_ORD, ordenes.N_ORD, clientes.NOMBRE, clientes.TELEFONO, clientes.ID_CLIENTE, ordenes.FECHA_INICIO, ordenes.HORA_INICIO, ordenes.FECHA_ENTREGA, ordenes.HORA_ENTREGA, ordenes.SALDO, ordenes.ID_TIENDA, tiendas.ABREV, tiendas.TIENDA, ordenes.TOTAL_KILOS, ordenes.TOTAL_PRENDAS, ordenes.ADOMICILIO
FROM (clientes INNER JOIN ordenes ON clientes.ID_CLIENTE = ordenes.ID_CLIENTE) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA
ORDER BY ordenes.ID_ORD DESC;
";
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
      <th scope="col">DETALLE</th>
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
      <td>Kilos: <?php echo $filasR ['TOTAL_KILOS']  ?>
      	 <br>Unidad: <?php echo $filasR ['TOTAL_PRENDAS']  ?>
      </td>
      <td> 
					<a href="crud_diario/create_vta.php?ido=<?php echo $filasR ['ID_ORD']?>" class="btn btn-primary"> 
					<span class="icon-checkmark"></span>
	      	</a> |

	      	<a href="mensajes_enviar.php?id_cliente=<?php echo $filasR ['ID_CLIENTE']?>" class="btn btn-success"> 
					<span class="icon-whatsapp"></span>
	      	</a>

      </td>
			</tr>
    <?php } ?>
  
  </tbody>
</table>
                    


  

<?php include('includes/footer_datatables.php'); ?>