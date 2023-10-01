<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>

  <?php 
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $queryR="SELECT * FROM vista_traslados
WHERE (((vista_traslados.ID_TRASLADO)='$id')" 
  $resultR=mysqli_query($conexion, $queryR);
  $filasR=mysqli_fetch_assoc($resultR);

}


  ?>

       <table class="table table-sm table-striped">
  <tbody>
    <tr>
      <th scope="row">TIPO DE TRASLADO</th>
      <td><?php echo $filasR ['TIPO_TRASLADO']?></td>
    </tr>
  
    <tr>
      <th scope="row">HORARIO</th>
      <td><?php echo $filasR ['HORARIO']?></td>

    </tr>
    <tr>
      <th scope="row">ORDEN DE SERVICIO</th>
      <td><?php echo $filasR ['ABREV']?>-<?php echo $filasR ['N_ORD']?></td>
    </tr>
    <tr>
      <th scope="row">ORIGEN</th>
      <td><?php echo $filaso ['TDAO']?></td>
    </tr>
    <tr>
      <th scope="row">FECHA_RECOJO</th>
      <td><?php echo $filaso ['FECHA_RECOJO']?></td>
    </tr>
    <tr>
      <th scope="row">DESTINO </th>
      <td><?php echo $filaso ['TDAD']?> </td>
    </tr>

    <tr>
      <th scope="row">FECHA_ENTREGA</th>
      <td><?php echo $filaso ['FECHA_ENTREGA']?></td>
    </tr>
    <tr>
      <th scope="row">CLIENTE</th>
      <td><?php echo $filaso ['NOMBRE']?></td>
    </tr>
    <tr>
      <th scope="row">OBSERBASION</th>
      <td><?php echo $filaso ['OBS_TRASLADO']?></td>
    </tr>


    <tr>
      <th scope="row">ESTADO</th>
      <td><?php echo $filaso ['STATUS_TRAS_DESC']?></td>
    </tr>
  </tbody>
</table>


<?php include('includes/footer.php'); ?>