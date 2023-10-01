<?php include('includes/header.php'); ?>
<div class="p-5 text-center">
<?php include("./../panel/data/conexion.php");?> 


  <br>
<h4>VENTAS LAVANDY</h4>
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
    <option selected></option>
    <?php 
      $query="SELECT * FROM tiendas ";
      $result=mysqli_query($conexion, $query);
    ?>
    <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      
    <option value="<?php echo $filas ['ID_TIENDA']?>" >
      <?php echo $filas ['TIENDA']  ?>
    </option>
    <?php } ?>

    </select>
    </div>



        <p class="text-center">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>        
        </p>

      


    </form>
    <div class="MsjAjaxForm"></div>

<?php include "./includes/scripts.php"; ?>
<?php include('includes/footer.php'); ?>