<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="stylos/stylos.css">
<?php include("data/conexion.php"); ?>
<?php include('menubar.php'); ?>


<div class="container">
  <div class="row">
    <div class="col-sm">

<?php
$id = $_GET['id'];
$t = $_GET['t'];

$tabla = $t;
$query = "DESCRIBE $tabla";
$result = mysqli_query($conexion, $query);
$indice = '';

// Obtener el nombre de la columna de índice primario
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Key'] == 'PRI') {
        $indice = $row['Field'];
        break;
    }
}

$queryR = "SELECT * FROM $tabla WHERE $indice = $id";
$resultR = mysqli_query($conexion, $queryR);
$filasR = mysqli_fetch_array($resultR);

?>

<form style="border: 1px solid gray;" action="crud_form/update.php" method="POST" enctype="multipart/form-data" class="colm">
<input class="form-control" type="hidden" id="id" 
      name="id" value="<?php echo $id; ?>" required>
  
  <div class="form-group">
    <span for="tabla">TABLA: </span>
    <input class="form-control" type="text" value="<?php echo $tabla ?>" id="tabla" name="tabla" readonly="readonly">
  </div>

  <?php
  $query = "DESCRIBE $tabla";
  $result = mysqli_query($conexion, $query);

  while ($row = mysqli_fetch_assoc($result)) {
      $type = 'text';
      $any = '';

      if ($row['Key'] == "PRI") {
          $Key = 'readonly="readonly"';
      } else {
          $Key = '';
      }

      switch ($row['Type']) {
          case 'int':
              $type = 'number';
              break;
          case  'varchar':
              $type = 'text';
              break;
          case 'date':
              $type = 'date';
              break;
          case 'decimal':
              $type = 'number';
              $any = 'step="any"';
              break;
          default:
              $type = 'text';
              break;
      }
  ?>

    <div class="form-group">
      <label for="<?php echo $row["Field"] ?>"><?php echo $row["Field"] ?></label>
      <input value="<?php echo $filasR[$row['Field']] ?>" class="form-control" type="<?php echo $type ?>" id="<?php echo $row["Field"] ?>" name="<?php echo $row["Field"] ?>" <?php echo $any ?>>
    </div>

  <?php }?>

  <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">GUARDAR</button>

</form>



    </div>

  </div>
</div>






<?php include('includes/footer.php'); ?>
