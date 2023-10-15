<?php include('panel/includes/header.php'); ?>

<!-- Main CSS -->
<link rel="stylesheet" href="./css/main.css">
<!-- Ionicons -->
<link rel="stylesheet" href="./css/ionicons.css">
<!-- iCheck -->
<link rel="stylesheet" href="./css/blue.css">






  <body>


    
    <form action="valida/valida_cliente.php" method="post" class="AjaxForms MainLogin" data-type-form="login" autocomplete="off">
        <p class="text-center text-muted lead text-uppercase">login</p>
        <div class="logo text-center"> 
        <img src="img/logo_circulo.png" width="100" heigth="100">
        </div>


        <div class="form-group">
          <label class="control-label" for="fono">TELEFONO</label>
          <input class="form-control" name="fono" id="fono" type="number" required="">
        </div>


        <p class="text-center">
            <button type="submit" class="btn btn-dark btn-block">INGRESAR</button></p>   
          
        <div class="invitado text-center">
        <a href="./index.php" class="btn btn-secondary  btn-block">Cancelar</a>
        </div>
        <br>
        <h6>¿Aun no tienes cuenta?<a href="./registro.php" class="ce">&nbsp Crear Cuenta</a></h6>
    </form>
    <div class="MsjAjaxForm"></div>

<?php include "./js/scripts.php"; ?>
<?php include('panel/includes/footer.php'); ?>