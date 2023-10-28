<?php include('includes/session.php');
include('includes/header.php');
include('menubar.php');
include("data/conexion.php");

// Realiza la consulta SQL para obtener información de las tablas en la base de datos 'lavandy'
$query = "SELECT table_name, engine, table_rows, update_time, data_length, table_comment
          FROM information_schema.tables
          WHERE table_schema = '$database'";
$result = mysqli_query($conexion, $query);
?>


<div class="container">
  <div class="row">
    <div class="col-sm">
<table class="table">
  <thead class="thead-light">
    <tr>      
      <th scope="col">TABLA</th>
      <th scope="col">FILAS</th>
      <th scope="col">PESO BITS</th>
      <th scope="col">ACTUALIZACION</th>
      <th scope="col" ><center><span class=" icon-folder-open "> </span></center> </th>
    </tr>
  </thead>
  <tbody>
  <?php while ($row = mysqli_fetch_assoc($result)) {?>
    <tr>
      <th scope="row"><?php  echo $row['table_name']  ; ?></th>
      <td><?php  echo $row['table_rows'] ; ?></td>
      <td><?php  echo $row['data_length'] ; ?></td>
      <td><?php  echo $row['update_time']; ?></td>
      <td> <center><a type="button" class="btn btn-primary" href="form_create_read.php?t=<?php  echo $row['table_name'] ; ?>"> <span class=" icon-folder-open "> </span>  </a></center>   </td>
    </tr>
  <?php  }  ?>
  </tbody>
</table>
    </div>

  </div>
</div>

<?php
include('includes/footer.php');
?>
