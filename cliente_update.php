<link rel="stylesheet" href="stylos/stylos.css">
<link rel="stylesheet" href="./style.css">

<?php 
$queryR= "
SELECT clientes.*, tiendas.TIENDA, perfume.PERFUME
FROM (clientes LEFT JOIN tiendas ON clientes.ID_TIENDA = tiendas.ID_TIENDA) LEFT JOIN perfume ON clientes.AROMA_PREFERIDO = perfume.ID_PERFUME
WHERE (((clientes.ID_CLIENTE)='$idclup'));

"; 
		$resultR = mysqli_query($conexion, $queryR);

if (mysqli_num_rows($resultR)==1) {
		$filasR=mysqli_fetch_array($resultR);

	$c1 = $filasR['ID_CLIENTE'];
	$c2 = $filasR['NOMBRE'];	
	$c3 = $filasR['SEXO'];
	$c4 = $filasR['ID_TIENDA'];
	$c5 = $filasR['TELEFONO'];
	$c6 = $filasR['RUC_DNI'];
	$c7 = $filasR['DIRECCION'];
	$c9 = $filasR['AROMA_PREFERIDO'];
	$c11 = $filasR['NREFERIDOS'];
$c10 = $filasR['PERFUME'];

}


?>

<div class="container p-4 mx-auto">
<style>
	.aviso{
		background: #ffff;
		padding-left: 10px;
		border-radius: 0.5em;
		padding-bottom: 10px;

	}
</style>
	<div class="aviso">
		<br>
		<h5>&nbsp<span class="icon-user-check"></span>&nbspMi Cuenta::</h5>
	    <h6>&nbsp &nbsp<span class="icon-cog"></span> Es importante contar con tus datos para una entrega eficiente.</h6> 
	     <h6>&nbsp &nbsp<span class="icon-cog"></span> Confirma tus datos al momento de realizar una compra.</h6>
	     
	</div>
<br>

  <div class="row" >

    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " class="colm">

<form action="crud_clientes/update.php" method="post"> 

  	<input value="<?php echo $idclup ?>" id="id_cliente" name="id_cliente" type="hidden" >

    <div class="form-row">
      <div class="col">
      <label for="n_cliente">NOMBRE DEL CLIENTE</label>
      <input value="<?php echo $c2 ?>" type="text" class="form-control" id="n_cliente" name="n_cliente" required>
      </div>
      <div class="col">
      <label for="sexo">SEXO </label>
          <select class="custom-select" id="sexo" name="sexo" required>
          <option selected value="<?php echo $c3 ?>"><?php echo $c3 ?> </option>
          <option value="M" > MASCULINO </option>         
          <option value="F" > FEMENINO </option>
          </select>

        </div>
    </div>

    <div class="form-row">
      <div class="col">
      <label for="telefono">TELEFONO</label>
      <input value="<?php echo $c5 ?>" type="number" class="form-control" id="telefono" name="telefono" required>
      </div>
      <div class="col">
      <label for="dniruc">DNI O RUC</label>
      <input value="<?php echo $c6 ?>" type="number" class="form-control" id="dniruc" name="dniruc" >
        </div>
    </div>

    <div class="form-group"> 
      <label for="direccion">DIRECCION</label>
      <input value="<?php echo $c7 ?>" type="text" class="form-control" id="direccion" name="direccion" >

    </div>

    <div class="form-row">
    <div class="col">
		<label for="id_perfume">AROMA PREFERIDO</label>
    <select class="custom-select" id="id_perfume" name="id_perfume" >
    <option selected value="<?php echo $c9 ?>"><?php echo $c10 ?></option>
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

    <div class="col">
		<label for="tienda">TIENDA </label>
    <select class="custom-select" id="tienda" name="tienda" >
    <option selected value="<?php echo $filasR ['ID_TIENDA']  ?>" >
    	<?php echo $filasR ['TIENDA']  ?>
    </option>
    <?php 
      $query="SELECT *FROM tiendas ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_TIENDA']?>" >
      <?php echo $filas ['TIENDA']  ?>
    </option>
    <?php } ?>

  	</select>
		</div>
    </div>


    <div class="form-group">
      <label for="referidos">REFERIDOS</label>
      <input value="<?php echo $c11 ?>" type="text" class="form-control" id="referidos" name="referidos" >
    </div>
  

	  <button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">ACTUALIZAR</button>

	  <a href="perfil.php" class="btn btn-dark btn-lg btn-block">CANCELAR</a>


  </form>


	</form>

    </div>
  </div>
</div>


<?php include('panel/includes/footer.php'); ?>