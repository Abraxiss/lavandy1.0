<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<br><br><br>
<div class="container" >
  <div class="row">

    <div class="col-sm">

    <form action="buscaord_nav.php" method="post" > 


    <div class="form-group">
      <label for="orden" style=" font-size: 19px; ">Ingrese el Numero de orden</label>
      <input type="number" class="form-control" id="orden" name="orden" required style=" font-size: 30px; ">
    </div>


    <button type="submit" id="guardar" name="guardar" class="btn btn-primary btn-lg btn-block mt-3" style=" font-size: 19px; ">BUSCAR</button>
    </form>

    </div>

  </div>
</div>


  <?php include('includes/footer_datatables.php'); ?>