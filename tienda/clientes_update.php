<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>
<br>
<center>  
<div class="card text-dark bg-secondary  mb-3" style="max-width: 100%;">
   <div class="card-body">
   <h5>ACTUALIZAR DATOS DEL CLIENTE</h5> 
  </div>
</div>
</center>
<br><br>
  <?php 

if (isset($_GET['id'])) {
  
  $id = $_GET['id'];

    $queryR="SELECT clientes.*, tiendas.ABREV, tiendas.TIENDA, perfume.PERFUME, clientes.ID_CLIENTE
FROM (clientes INNER JOIN tiendas ON clientes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN perfume ON clientes.AROMA_PREFERIDO = perfume.ID_PERFUME
WHERE (((clientes.ID_CLIENTE)='$id'))";
  $resultR=mysqli_query($conexion, $queryR);
$filasR=mysqli_fetch_assoc($resultR);
 
} else {

  mysqli_close($conexion);
echo'<script type="text/javascript">
    window.location.href="./../clientes_read.php";
    </script>';

};
  ?>


<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm-6">
      

      <form action="crud_clientes/update.php" method="post"> 

    <input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
    <input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >
    <input value="<?php echo $id ?>" id="id_cliente" name="id_cliente" type="hidden" >

    <div class="form-row">
      <div class="col">
      <label for="n_cliente">NOMBRE DEL CLIENTE</label>
      <input value="<?php echo $filasR ['NOMBRE']  ?>" type="text" class="form-control" id="n_cliente" name="n_cliente" required>
      </div>
      <div class="col">
      <label for="sexo">SEXO </label>
          <select class="custom-select" id="sexo" name="sexo" required>
          <option selected value="<?php echo $filasR ['SEXO']  ?>" > <?php echo $filasR ['SEXO']  ?></option>
          <option value="M" > MASCULINO </option>         
          <option value="F" > FEMENINO </option>
          </select>

        </div>

    </div>

    <div class="form-group">
      <label for="tienda">TIENDA</label>
      <select class="custom-select" id="tienda" name="tienda" required>
    <option selected value="<?php echo $filasR ['ID_TIENDA']  ?>" ><?php echo $filasR ['ABREV']  ?> - <?php echo $filasR ['TIENDA']  ?></option>
    <?php 
      $query="SELECT * FROM tiendas ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>  
      
    <option value="<?php echo $filas ['ID_TIENDA']?>" >
      <?php echo $filas ['TIENDA']  ?>
    </option>
    <?php } ?>

    </select>
    </div>


    <div class="form-row">
      <div class="col">
      <label for="telefono">TELEFONO</label>
      <input value="<?php echo $filasR ['TELEFONO']  ?>" type="number" class="form-control" id="telefono" name="telefono" required>
      </div>
      <div class="col">
      <label for="dniruc">DNI O RUC</label>
      <input value="<?php echo $filasR ['RUC_DNI']  ?>" type="number" class="form-control" id="dniruc" name="dniruc" >
        </div>
    </div>

    <div class="form-row"> 
    <div class="col">
      <label for="direccion">DIRECCION</label>
      <input value="<?php echo $filasR ['DIRECCION']  ?>" type="text" class="form-control" id="direccion" name="direccion" >
    </div>

    <div class="col">
      <label for="link_u">LINK DE UBICACION</label>
      <input value="<?php echo $filasR ['LINK_UBICACION']  ?>"  type="text" class="form-control" id="link_u" name="link_u" >
    </div>
    </div>

    <div class="form-row">
    <div class="col">
    <label for="id_perfume">AROMA PREFERIDO</label>
    <select class="custom-select" id="id_perfume" name="id_perfume" >
    <option selected value="<?php echo $filasR ['AROMA_PREFERIDO']  ?>" ><?php echo $filasR ['PERFUME']  ?></option>
    <?php 
      $query="SELECT * FROM perfume ";
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
          <option selected value="<?php echo $filasR ['CALIFICACION_CLIENTE']?>" > <?php echo $filasR ['CALIFICACION_CLIENTE']  ?> </option>
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
      <input value="<?php echo $filasR ['COMENTARIO_CALIFICACION']?>" type="text" class="form-control" id="comentario" name="comentario" >
    </div>


    <div class="form-group">
      <label for="referidos">REFERIDOS</label>
      <input value="<?php echo $filasR ['NREFERIDOS']?>" type="text" class="form-control" id="referidos" name="referidos" >
    </div>
  

    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">GUARDAR</button>
  </form>

    </div>
    <div class="col-sm">
    </div>
  </div>
</div>

  




<?php include('includes/footer.php'); ?>