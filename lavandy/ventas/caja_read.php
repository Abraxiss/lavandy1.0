<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>
<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#noperacion" >
  <span class="icon-drawer "></span> NUEVA OPERACION 
</button>

<!-- Modal -->
<div class="modal fade" id="noperacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Operacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="container mt-2">
   <span class="icon-box-remove  "></span> INGRESOS   
        <a href="ordenes_read.php" class="btn btn-primary btn-lg btn-block">SALDO INICIAL</a>
        <a href="clientes_read.php" class="btn btn-primary btn-lg btn-block">INGRESOS DIVERSOS</a>
        <br>
    <span class=" icon-box-add  "></span> EGRESOS  

        <a href="traslados_read_p.php" class="btn btn-primary btn-lg btn-block">ENTREGAS A RENDIR </a>
        
        <a href="user_update.php" class="btn btn-primary btn-lg btn-block">ENTREGA A CAJA CENTRAL</a> 

        <a href="user_update.php" class="btn btn-primary btn-lg btn-block">GASTOS DIVERSOS</a> 

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
    $queryR="SELECT * FROM mov_caja
WHERE ID_TIENDA='$idtiendaup'AND SALDO<>0"; 
  $resultR=mysqli_query($conexion, $queryR);
  ?>



<table class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
   
      <th style="text-align: center;"><span class="icon-users "></span></th>
      <th scope="col">FECHA</th>
      <th scope="col">ORDEN</th>
      
      <th scope="col">GLOSA</th>
      <th style="text-align: right;">INGRESO</th>
      <th style="text-align: right;">SALIDA</th>
      <th style="text-align: right;">SALDO</th>
      <th style="text-align: center;">OPCIONES</th>
    </tr> 
  </thead>
  <tbody>
   
      <?php while($filasR=mysqli_fetch_assoc($resultR)) { ?>
      <tr>   

      <td style="text-align: center;">
        <a href="clientes_update.php?id=<?php echo $filasR ['ID_CLIENTE']  ?>" class="btn 
          btn-primary " target="_blank"> 
          <span class="icon-users "></span>
        </a> 
      </td>

      <td>
        <span class="icon-clock2 "></span><?php echo $filasR ['FECHA_OP']  ?>
        <br>
        <span class="icon-user "></span><?php echo $filasR ['user_nick']  ?>
      </td>  

      <td>
        <?php echo $filasR ['ABREV']  ?> - <?php echo $filasR ['N_ORD']  ?>
      </td>


      <td> 
           <?php echo $filasR ['N_CCOSTO']  ?>
        <br>
            
           <?php echo $filasR ['GLOSA']  ?>
      </td>
      <td style="text-align: right;"> 
      <?php echo $filasR ['DEBE']  ?>
      </td>
      <td style="text-align: right;"> 
      <?php echo $filasR ['HABER']  ?>
      </td>
      <td style="text-align: right;"> 
      <?php echo $filasR ['SALDO']  ?>
      </td>



      <td style="text-align: center;"> 
          <a href="ordenes_detalle.php?id=<?php echo $filasR ['ID_ORD']?>" class="btn btn-dark"> 
          <span class="icon-price-tags"></span>
          </a> 

    <?php } ?>

  <?php 
    $queryT="SELECT mov_caja.ID_TIENDA, Sum(mov_caja.DEBE) AS SumaDeDEBE, Sum(mov_caja.HABER) AS SumaDeHABER, Sum(mov_caja.SALDO) AS SumaDeSALDO
      FROM mov_caja
      GROUP BY mov_caja.ID_TIENDA
      HAVING (((mov_caja.ID_TIENDA)='$idtiendaup'))"; 
    $resultT=mysqli_query($conexion, $queryT);
    $filasT=mysqli_fetch_assoc($resultT)
  ?>


  <tr style="background-color: black; color: white;">
  <td></td>
  <td></td>
  <td></td>
  <td>TOTALES</td>
  <td style="text-align: right;"><?php echo $filasT ['SumaDeDEBE']?></td>
  <td style="text-align: right;"><?php echo $filasT ['SumaDeHABER']?></td>
  <td style="text-align: right;"><?php echo $filasT ['SumaDeSALDO']?></td>
  <td></td>
  </tr>

    
  </tbody>



<?php include('includes/footer.php'); ?>