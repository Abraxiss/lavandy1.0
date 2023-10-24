<?php include('includes/header.php'); ?>
<div class="p-5 text-center">

<style>
  body {


background: #49257C;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #000000, #49257C, #000000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #000000, #49257C, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


color: white;
}
</style>

<h4>MOVILIDAD LAVANDY</h4>
</div>

<br><br>
<!-- Main CSS -->
<link rel="stylesheet" href="./stylos/main.css">
<!-- Ionicons -->
<link rel="stylesheet" href="./stylos/ionicons.css">
<!-- iCheck -->
<link rel="stylesheet" href="./stylos/blue.css">


  <body>
    <form action="valida/valida_user.php" method="post" class="AjaxForms MainLogin" data-type-form="login" autocomplete="off">
        <p class="text-center text-muted lead text-uppercase">login</p>
        <div class="form-group">
          <label class="control-label" for="usuario">DNI</label>
          <input class="form-control" name="usuario" id="usuario" type="number" required="">
        </div>
        <div class="form-group">
          <label class="control-label" for="pass">Contraseña</label>
          <input class="form-control" name="pass" id="pass" type="password" required="">
        </div>



    <div class="form-group">
    <label for="id_tienda">TIENDA:</label>
    <select class="custom-select" id="id_tienda" name="id_tienda" required>
    <option selected value="8">Delibery</option>


    </select>
    </div>


        <p class="text-center">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>        
        </p>

      


    </form>
    <div class="MsjAjaxForm"></div>


<?php include('includes/footer.php'); ?>