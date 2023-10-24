<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<div class="p-5 text-center">
  <br>
<h4>Nuevo Registro</h4>
</div>
<!-- Main CSS -->
<link rel="stylesheet" href="./stylos/main.css">
<!-- Ionicons -->
<link rel="stylesheet" href="./stylos/ionicons.css">
<!-- iCheck -->
<link rel="stylesheet" href="./stylos/blue.css">

  <body>
    <form action="crud_user/create.php" method="post" class="AjaxForms MainLogin" data-type-form="login" autocomplete="off">
        <p class="text-center text-muted lead text-uppercase">login</p>
        <div class="form-group">
          <label class="control-label" for="user_nombre">Usuario</label>
          <input class="form-control" name="user_nombre" id="user_nombre" type="text" required="">
        </div>
        <div class="form-group">
          <label class="control-label" for="user_empresa">Empresa</label>
          <input class="form-control" name="user_empresa" id="user_empresa" type="text" required="">
        </div>     
        <div class="form-group">
          <label class="control-label" for="user_correo">Correo</label>
          <input class="form-control" name="user_correo" id="user_correo" type="email" required="">
        </div>

        <div class="form-group">
          <label class="control-label" for="user_clave">Contraseña</label>
          <input class="form-control" name="user_clave" id="user_clave" type="password" required="">
        </div>
        <p class="text-center">
            <button type="submit" class="btn btn-primary btn-block">REGISTRAR</button>     
        </p>

        <a href="./index.php" class="btn btn-primary  btn-block">CANCELAR</a>

    </form>
    <div class="MsjAjaxForm"></div>

<?php include "./includes/scripts.php"; ?>
<?php include('includes/footer.php'); ?>