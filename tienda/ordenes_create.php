<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<?php 
if (isset($_GET['idc'])) {
  
  $ID_CLIENTE = $_GET['idc'];
$query="   SELECT clientes.*, tiendas.ABREV, tiendas.TIENDA, perfume.PERFUME, clientes.ID_CLIENTE
FROM (clientes INNER JOIN tiendas ON clientes.ID_TIENDA = tiendas.ID_TIENDA) INNER JOIN perfume ON clientes.AROMA_PREFERIDO = perfume.ID_PERFUME
WHERE (((clientes.ID_CLIENTE)='$ID_CLIENTE'))
 ";
   $result=mysqli_query($conexion, $query);
   $filas=mysqli_fetch_assoc($result);


}
 $id_perfume = $filas ['AROMA_PREFERIDO'];

$n_perfume = $filas ['PERFUME'];


?>

<br>

<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm-8">

<form action="crud_ordenes/create.php" method="post"> 

    <input value="<?php echo $idtiendaup ?>" id="id_tienda" name="id_tienda" type="hidden" >
    <input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >
        
    <div class="form-group">
      <label for="n_ord">Número de Orden:</label>
      <input type="number" class="form-control" id="n_ord" name="n_ord" required>
    </div>



    <div class="form-group">
    <label for="id_cliente">Cliente:</label>
    <select class="custom-select" id="id_cliente" name="id_cliente" required>
    <option selected value="<?php echo $ID_CLIENTE ?>"><?php echo $filas ['TELEFONO']?> <?php echo $filas ['NOMBRE']?></option>
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
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
      </div>
      <div class="col">
        <label for="hora_inicio">Hora de Inicio:</label>
        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
        </div>
    </div>



 <div class="form-row">
      <div class="col">
      <label for="fecha_entrega">Fecha de Entrega:</label>
      <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" required>
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
    <label for="id_perfume">Perfume </label>
    <select class="custom-select" id="id_perfume" name="id_perfume" required>
    <option selected value="<?php echo $id_perfume; ?>">
     <?php echo $n_perfume; ?> </option>
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
    <div class="col-sm">
    </div>
  </div>
</div>








  

<?php include('includes/footer.php'); ?>