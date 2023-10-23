<?php include('includes/header.php'); ?>
<div class="p-5 text-center">
  <br>
<h4>Mi Catálogo</h4>
</div>


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
          <label class="control-label" for="usuario">Usuario</label>
          <input class="form-control" name="usuario" id="usuario" type="text" required="">
        </div>
        <div class="form-group">
          <label class="control-label" for="pass">Contraseña</label>
          <input class="form-control" name="pass" id="pass" type="password" required="">
        </div>
        <p class="text-center">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>        
        </p>

        <a href="./registro.php" class="">Crear Cuenta</a>


    </form>
    <div class="MsjAjaxForm"></div>

<?php include "./includes/scripts.php"; ?>
<?php include('includes/footer.php'); ?>