<?php include('panel/includes/header.php'); ?>
<link rel="stylesheet" href="style.css">
<!-- Main CSS -->
<link rel="stylesheet" href="./css/main.css">
<!-- Ionicons -->
<link rel="stylesheet" href="./css/ionicons.css">
<!-- iCheck -->
<link rel="stylesheet" href="./css/blue.css">



  </div>


<div class="p-5 text-center">
  <br>
<h4>Nuevo Registro</h4>
</div>


  <body>
    <form action="./crud_clientes/create.php" method="post" class="AjaxForms MainLogin" data-type-form="login" autocomplete="on">
        <p class="text-center text-muted lead text-uppercase">login</p>

        <div class="form-group">
          <label class="control-label" for="cl_email">Documento de Identidad</label>
          <input class="form-control" name="cl_dni" id="cl_dni" type="number"  placeholder="Número de DNI" maxlength="7" required="">
        </div>

        <div class="form-group">
          <label class="control-label" for="cl_nombre">Nombre</label>
          <input class="form-control" name="cl_nombre" id="cl_nombre" type="text" placeholder="Nombre de usuario" required="">
        </div>

        <div class="form-group">
          <label class="control-label" for="cl_numero">Número Movil</label>
          <input class="form-control" name="cl_numero" id="cl_numero" type="number" placeholder="999 999 999" maxlength="8" required="">
        </div>     


        <div class="form-group">
          <label class="control-label" for="cl_clave">Contraseña</label>
          <input class="form-control" name="cl_clave" id="cl_clave" type="password" required="">
        </div>

        <p class="text-center">
            <button type="submit" id="guardar" name="guardar" class="btn btn-warning btn-block">REGISTRAR</button>     
        </p>

        <a href="./index.php" class="btn btn-warning  btn-block">CANCELAR</a>

    </form>
    <div class="MsjAjaxForm"></div>

<?php include "./js/scripts.php"; ?>
<?php include('panel/includes/footer.php'); ?>