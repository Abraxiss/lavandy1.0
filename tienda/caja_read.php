<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br><br>
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
<form action="crud_diario/create_gasto.php" method="post"> 

    <input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
    <input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >


<h5><span class="icon-coin-dollar"></span> Nueva Operacion:</h5>
<div class="dropdown-divider"></div>


<div class="form-row">
<div class="col">
        <label for="id_tipoop">OPERACION</label>
        <select class="custom-select" id="id_tipoop" name="id_tipoop" required>
        <option selected ></option>
      
        <option value="1" > SALDO INICIAL  </option>
        <option value="2" > INGRESOS DIVERSOS </option>        
        <option value="3" > ENTREGAS A RENDIR  </option>
        <option value="4" > ENTREGA A CAJA CENTRAL  </option>
        <option value="6" > RETIRO DE CLIENTE </option>
        <option value="7" > RECARGA DE CLIENTE </option>
        <option value="6" > CAJA A BANCO </option>
        <option value="7" > BANCO A CAJA </option>
        <option value="5" > GASTOS DIVERSOS </option>
        </select> 

</div>
  <div class="col">
 
        <label for="fecha">FECHA </label>
        <input value="<?php echo $fecha_serv?>" type="date" class="form-control" id="fechar" name="fechar" >
    
</div>
</div>

<div class="form-row"> 
<div class="col">   
        <label for="forma_pago">FORMA DE PAGO</label>
        <select class="custom-select" id="forma_pago" name="forma_pago" required>
        <option selected></option>
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
<div class="col">
      <label for="importe">S/. IMPORTE</label>
      <input step="any" type="number" class="form-control" id="importe" name="importe" >
</div>
</div> 

<div class="form-group">
      <label for="glosa">DESCRIPCION</label>
      <input type="text" class="form-control" id="glosa" name="glosa" required>
</div>   


<div class="dropdown-divider"></div>

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
    $queryR="

SELECT diario.ID_DIARIO, diario.FECHA_OP, diario.ID_ORD, ordenes.ID_USER, usuarios.user_nick, ordenes.N_ORD, tiendas.ABREV, diario.TIPO_OPERACION AS ID_TIPO, tipo_operacion.NTIPO_OPERACION, diario.CCOSTO, ccosto.N_CCOSTO, diario.GLOSA, pcge.TRESDIGITOS, diario.DEBE, diario.HABER, diario.SALDO, diario.ID_TDA, ordenes.ID_CLIENTE, pcge.CTA_CONT
FROM (((((diario LEFT JOIN ordenes ON diario.ID_ORD = ordenes.ID_ORD) INNER JOIN tipo_operacion ON diario.TIPO_OPERACION = tipo_operacion.ID_TIPOOP) INNER JOIN ccosto ON diario.CCOSTO = ccosto.ID_CCOSTO) INNER JOIN pcge ON diario.CTA_CONTABLE = pcge.ID_CTA) INNER JOIN tiendas ON diario.ID_TDA = tiendas.ID_TIENDA) INNER JOIN usuarios ON diario.ID_USER = usuarios.id_user
WHERE (((pcge.TRESDIGITOS)=101) AND ((diario.SALDO)<>0) AND ((diario.ID_TDA)='$idtiendaup'))
ORDER BY diario.ID_DIARIO DESC;





"; 
  $resultR=mysqli_query($conexion, $queryR);
  ?>




<table class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
   
      <th style="text-align: center;"><span class="icon-users "></span></th>
      <th scope="col">FECHA</th>
      <th scope="col">ORDEN</th>
      
      <th scope="col">GLOSA</th>
      <th style="text-align: right;">F. PAGO</th>
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
      <?php echo $filasR ['CTA_CONT']  ?>
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
          <a href="crud_diario/delete_caja.php?d=<?php echo $filasR ['ID_DIARIO'] ?>&o=<?php echo $filasR ['ID_ORD'] ?>&x=1" class="btn btn-danger" > 
          <span class="icon-bin"></span>
          </a>           
      </td>
    <?php } ?>

  <?php 
    $queryT="SELECT pcge.TRESDIGITOS, diario.ID_TDA, Sum(diario.DEBE) AS SumaDeDEBE, Sum(diario.HABER) AS SumaDeHABER, Sum(diario.SALDO) AS SumaDeSALDO
FROM diario INNER JOIN pcge ON diario.CTA_CONTABLE = pcge.ID_CTA
GROUP BY pcge.TRESDIGITOS, diario.ID_TDA
HAVING (((pcge.TRESDIGITOS)=101) AND ((diario.ID_TDA)='$idtiendaup'));


"; 
    $resultT=mysqli_query($conexion, $queryT);
    $filasT=mysqli_fetch_assoc($resultT)
  ?>


  <tr style="background-color: black; color: white;">
  <td></td>
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
</table>

<br>

  <?php 
  $queryS="SELECT diario.ID_TDA, pcge.TRESDIGITOS, pcge.CTA_CONT, Sum(diario.SALDO) AS SumaDeSALDO
FROM diario INNER JOIN pcge ON diario.CTA_CONTABLE = pcge.ID_CTA
GROUP BY diario.ID_TDA, pcge.TRESDIGITOS, pcge.CTA_CONT
HAVING (((diario.ID_TDA)='$idtiendaup') AND ((pcge.TRESDIGITOS)=101));


";
  $resultS=mysqli_query($conexion, $queryS);
  
  ?>


<div class="container">
  <div class="row">
    <div class="col-sm">

      <div class="card">
      <div class="card-header">
        SALDO DE CAJA  S/. <?php echo $filasT ['SumaDeSALDO']?>
      </div>
      <div class="card-body">

<table class="table table-sm ">
  <thead class="table-info">
    <tr>
      <th scope="col">CAJA</th>
      <th scope="col">SALDO</th>
    </tr>
  </thead>
  <tbody>
    <?php while($filasS=mysqli_fetch_assoc($resultS)) { ?>
    <tr>
      <th scope="row"><?php echo $filasS ['CTA_CONT']  ?></th>
      <td><?php echo $filasS ['SumaDeSALDO']  ?></td>

    </tr>
    <?php } ?>
  </tbody>
</table>



      </div>
      </div>


    </div>
    <div class="col-sm">

      <div class="card">
      <div class="card-header">
  <?php 
  $queryXC="SELECT ordenes.ID_TIENDA, Sum(ordenes.SALDO) AS SumaDeSALDO
FROM ordenes
GROUP BY ordenes.ID_TIENDA
HAVING (((ordenes.ID_TIENDA)='$idtiendaup'));

";
  $resultXC=mysqli_query($conexion, $queryXC);
  $filasXC=mysqli_fetch_assoc($resultXC);
  $XCOBRAR=$filasXC ['SumaDeSALDO']; 
  ?>
      <a href="porcobrar.php" class="btn btn-secondary btn-sm"> 
      <span class=" icon-folder-open"></span>
      </a>  CUENTAS POR COBRAR S/. <?php echo $filasXC ['SumaDeSALDO']  ?>
      </div>
      <div class="card-body">

  <?php 
  $queryCC="SELECT ordenes.ID_ORD, ordenes.ID_TIENDA, tiendas.ABREV, ordenes.N_ORD, ordenes.ID_CLIENTE, clientes.NOMBRE, ordenes.SALDO
FROM (ordenes INNER JOIN clientes ON ordenes.ID_CLIENTE = clientes.ID_CLIENTE) INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA
WHERE (((ordenes.ID_TIENDA)='$idtiendaup') AND ((ordenes.SALDO)<>0))
ORDER BY ordenes.SALDO DESC
LIMIT 0, 5;
";
  $resultCC=mysqli_query($conexion, $queryCC);
  
  ?>




<table class="table table-sm ">
  <thead class="table-info">
    <tr>
      <th scope="col">ORDEN</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">SALDO</th>
      <th scope="col"><center> <span class="icon-price-tags"></span></center></th>
    </tr>
  </thead>
  <tbody>
    <?php while($filasCC=mysqli_fetch_assoc($resultCC)) { ?>
    <tr>
      <th scope="row"><?php echo $filasCC['ABREV']?>-<?php echo $filasCC ['N_ORD']  ?></th>
      <td><?php echo $filasCC ['NOMBRE']  ?></td>
      <td><?php echo $filasCC ['SALDO']  ?></td>
      <td style="text-align: center;"> 

          <a href="ordenes_detalle.php?id=<?php echo $filasCC ['ID_ORD']?>" class="btn btn-dark btn-sm"> 
          <span class="icon-price-tags"></span>
          </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

      </div>
      </div>

    </div>

  </div>
</div>








<?php include('includes/footer.php'); ?>