<?php include("includes/session.php"); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>
<?php include('menubar.php'); ?>

<?php 
if (isset($_GET['id'])) {
  
$ID_DETALLE = $_GET['id'];
$ID_ORD = $_GET['io'];
$ID_PROCESO = $_GET['ip'];
  $queryR="
SELECT detallesdeord.ID_DETALLE, detallesdeord.DESCRIPCION, detallesdeord.COLOR, detallesdeord.STADO_PREN
FROM detallesdeord
WHERE (((detallesdeord.ID_DETALLE)='$ID_DETALLE'));
";
$resultR=mysqli_query($conexion, $queryR);
$filasR=mysqli_fetch_assoc($resultR);

$PRENDA = $filasR ['DESCRIPCION'];
$COLOR = $filasR ['COLOR'];
$STADO = $filasR ['STADO_PREN'];

}
?>

<?php
  $queryP="

SELECT procesos.ID_ORD, detallesdeord.TIPO_VTA, detallesdeord.CANTIDA, detallesdeord.DESCRIPCION, detallesdeord.COLOR, detallesdeord.OBSERVACION_DTLL, secuencias.SECUENCIA, procesos.F_INICIO, procesos.H_INICIO, procesos.T_ESTIMADO, procesos.OBS_PROCESO, detallesdeord.STADO_PREN, metodos.METODO, detallesdeord.ID_DETALLE, procesos.ID_PROCESO, secuencias.ID_SECUENCIA, metodos.ID_METODO
FROM ((secuencias RIGHT JOIN procesos ON secuencias.ID_SECUENCIA = procesos.ID_SECUENCIA) INNER JOIN detallesdeord ON procesos.ID_ORD_DTLL = detallesdeord.ID_DETALLE) LEFT JOIN metodos ON procesos.ID_METODO = metodos.ID_METODO
WHERE (((procesos.ID_PROCESO)='$ID_PROCESO'));



";

$resultP=mysqli_query($conexion, $queryP);
$filasP=mysqli_fetch_assoc($resultP);

?>


<br><br>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
     <h5>PROCESO:</h5>
<div class="dropdown-divider"></div>
<h6>Prenda: <?php echo $PRENDA ?></h6>
<h6>Color: <?php echo $COLOR ?></h6>
<h6>Estado: <?php echo $STADO ?></h6>
<div class="dropdown-divider"></div>
<form action="crud_procesos/update.php" method="post"> 

    <input value="<?php echo $id_userup ?>" id="id_user" name="id_user" type="hidden" >
    <input value="<?php echo $ID_ORD ?>" id="id_ord" name="id_ord" type="hidden" > 
    <input value="<?php echo $ID_DETALLE ?>" id="id" name="id" type="hidden" > 
    <input value="<?php echo $ID_PROCESO ?>" id="idPROCESO" name="idPROCESO" type="hidden" >
    <div class="form-row">
    <div class="col"> 
    <label for="secuencia">PROCESO:</label>
    <select class="custom-select" id="secuencia" name="secuencia" required>
    <option selected value="<?php echo $filasP ['ID_SECUENCIA']?>" ><?php echo $filasP ['SECUENCIA'];?></option>
    <?php 
      $query="SELECT *FROM secuencias ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_SECUENCIA']?>" >
      <?php echo $filas ['SECUENCIA']  ?>  
    </option>
    <?php } ?>

    </select>
    </div>
    

    <div class="col">
    <label for="metodo">METODO:</label>
    <select class="custom-select" id="metodo" name="metodo" required>
    <option selected value="<?php echo $filasP ['ID_METODO']?>" ><?php echo $filasP ['METODO'];?></option>
    <?php 
      $query="SELECT *FROM metodos ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_METODO']?>" >
      <?php echo $filas ['METODO']  ?>  
    </option>
    <?php } ?>

    </select>
    </div>
    </div>


    <div class="form-row">
      <div class="col">
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input value="<?php echo $filasP ['F_INICIO'];?>" type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
      </div>
      <div class="col">
        <label for="hora_inicio">Hora de Inicio:</label>
        <input value="<?php echo $filasP ['H_INICIO'];?>" type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
        </div>
    </div>

    <div class="form-group">
      <label for="minutos">MINUTOS ESTIMADOS:</label>
      <input value="<?php echo $filasP ['T_ESTIMADO'];?>" type="number" class="form-control" id="minutos" name="minutos" required>
    </div>


    <div class="form-group">
      <label for="obs">OBSERVACION</label>
      <input value="<?php echo $filasP ['OBS_PROCESO'];?>" type="text" class="form-control" id="obs" name="obs" >
    </div>

<div class="dropdown-divider"></div>


    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">GUARDAR</button>
  </form>



    </div>
    <div class="col-sm">

           <?php 
            $query="
SELECT procesos.*, secuencias.ID_SECUENCIA, secuencias.SECUENCIA, metodos.METODO
FROM (procesos LEFT JOIN secuencias ON procesos.ID_SECUENCIA = secuencias.ID_SECUENCIA) LEFT JOIN metodos ON procesos.ID_METODO = metodos.ID_METODO
WHERE (((procesos.ID_ORD_DTLL)='$ID_DETALLE'))
ORDER BY secuencias.ID_SECUENCIA;


            ";
            $result=mysqli_query($conexion, $query);
 
            ?>

<br>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FECHA</th>
      <th scope="col">SECUENCIA</th>
      <th scope="col">METODO</th>      
      <th scope="col">ESTIMADO</th>
      <th scope="col">OBSERVACION</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $filas ['ID_SECUENCIA']  ?> </td>
      <td><?php echo $filas ['F_INICIO']  ?> </td>
      <th><?php echo $filas ['SECUENCIA']  ?> </th>
      <td><?php echo $filas ['METODO']  ?> </td>      
      <td><?php echo $filas ['T_ESTIMADO']  ?> </td>
      <td><?php echo $filas ['OBS_PROCESO']  ?> </td>
      <td>           
        <a href="procesos_create.php?id=<?php echo $ID_DETALLE ?>&io=<?php echo $ID_ORD ?>&ip=<?php echo $filas ['ID_PROCESO']  ?>" class="btn btn-dark"> 
          <span class=" icon-pencil2 "></span>
          </a> 
          <a href="crud_procesos/delete.php?id=<?php echo $ID_DETALLE ?>&io=<?php echo $ID_ORD ?>&ip=<?php echo $filas ['ID_PROCESO']  ?>" class="btn btn-danger"> 
          <span class=" icon-bin "></span>
          </a> 
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

    </div>

  </div>
</div>


  

<?php include('includes/footer.php'); ?>