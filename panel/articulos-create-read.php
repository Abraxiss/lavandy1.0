<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="stylos/stylos.css">
<link rel="stylesheet" href="./style.css">
<?php include('menubar.php'); ?>

<br>
<div class="container p-3">


<h4> MIS PRODUCTOS </h4>
  <div class="row" >
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" class="colm">
     <?php include('articulos_create.php'); ?> 
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
    <?php include('articulos_read.php'); ?> 
    </div>

  </div>
</div>






<?php include('includes/footer.php'); ?>