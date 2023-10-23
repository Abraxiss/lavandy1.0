<?php
$t = $_GET['t'];
$query2 = "SELECT * FROM $t";
$result2 = mysqli_query($conexion, $query2);

$tabla = $t;
$query = "SHOW KEYS FROM $tabla WHERE Key_name = 'PRIMARY'";
$result = mysqli_query($conexion, $query);

// Obtener el nombre de la columna de índice primario
$indice = '';
while ($row = mysqli_fetch_assoc($result)) {
    $indice = $row['Column_name'];
    break;  // Tomamos la primera columna de la clave primaria
}

?>

<!-- Cabeceras de la tabla -->

<span>REGISTROS:</span>
<br>
<table class="table table-bordered text-center">
  <thead class="thead-light">
    <tr>
      <?php
      // Mostrar las cabeceras de las columnas de la tabla
      $result = mysqli_query($conexion, "DESCRIBE $tabla");
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<th>' . $row["Field"] . '</th>';
      }
      ?>
      <th>Eliminar</th> <!-- Agregamos una columna para eliminar -->
      <th>Actualizar</th> <!-- Agregamos una columna para eliminar -->
    </tr>
  </thead>

  <!-- Contenido de la tabla -->
  <tbody>
    <?php while ($filas = mysqli_fetch_assoc($result2)) { ?>
      <tr>
        <?php foreach ($filas as $campo) { ?>
          <td><?php echo $campo; ?></td>
        <?php } ?>
        <td>
          <!-- Enlace para eliminar con el ID correspondiente -->
          <a href="form_delete.php?id=<?php echo $filas[$indice]; ?>&t=<?php echo $t; ?>" class="btn btn-danger">
            <span class="icon-bin"></span>
          </a>
        </td>
        <td>
          <!-- Enlace para actualizar con el ID correspondiente -->
          <a href="form_update.php?id=<?php echo $filas[$indice]; ?>&t=<?php echo $t; ?>" class="btn btn-primary">
            <span class="icon-checkmark"></span>
          </a>
        </td>

      </tr>
    <?php } ?>
  </tbody>
</table>

<?php
mysqli_close($conexion);
?>
