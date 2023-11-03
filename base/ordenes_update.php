<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<?php include("../panel/data/conexion.php"); ?>

<?php include('menubar.php'); ?>

<br>

<?php 

if (isset($_GET['id'])) {
$ID_ORD=$_GET['id'];

  $queryo="
SELECT ordenes.N_ORD, ordenes.ID_ORD, ordenes.OBS_ORD, tiendas.ABREV
FROM ordenes INNER JOIN tiendas ON ordenes.ID_TIENDA = tiendas.ID_TIENDA
WHERE (((ordenes.ID_ORD)='$ID_ORD'))
";

  $resulto=mysqli_query($conexion, $queryo);
$filaso=mysqli_fetch_assoc($resulto);

}
?>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-sm">

  <form action="crud_ordenes/update_ord.php" method="post"> 
    <input value="<?php echo $ID_ORD ?>" id="id_ord" name="id_ord" type="hidden" >
        
    <div class="form-group">
    <B><h4>
    <span class="icon-price-tags"></span> ORDEN | <?php echo $filaso ['ABREV']?>-<?php echo $filaso ['N_ORD']?> 
    </B></h4>
    </div>


    <div class="form-group">
      <label for="obs_ord">OBSERVACION</label>
      <input type="text" class="form-control" id="obs_ord" name="obs_ord" value="<?php echo $filaso ['OBS_ORD']?>" >
    </div>

    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3">ACTUALIZAR</button>
  </form>

    </div>
  </div>
</div>


<?php include('includes/footer.php'); ?>

