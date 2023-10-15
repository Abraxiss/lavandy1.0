
   <?/*---formulario tabla---*/?>
<?php 
$t = $_GET['t'];
?>
<form style="border: 1px solid gray; "  action="crud_form/create.php" method="POST" enctype="multipart/form-data" class="colm">
<?php
$tabla = $t;
$query = "DESCRIBE $tabla";
$result = mysqli_query($conexion, $query);
?>

  <div class="form-group" >
    <span for="tabla">TABLA: </span>
    <input class="form-control" type="text" value="<?php echo $tabla ?>" id="tabla" name="tabla"  readonly="readonly">
  </div>

<?php    while ($row = mysqli_fetch_assoc($result)) {  ?>
<?php 
$typeParts = explode('(', $row["Type"]);
$type = $typeParts[0];
$any = '';
$idText = substr($type, 0, 2);

switch ($type) {
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
  <div class="form-group" >
    <label for="<?php echo $row["Field"]  ?>"><?php echo $row["Field"]  ?> </label>
    <input class="form-control" type="<?php echo $type  ?>" id="<?php echo $row["Field"]  ?>" name="<?php echo $row["Field"]  ?>" <?php echo $any  ?> >
  </div>

    <?php }?>


      <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">GUARDAR</button>
  
</form>


