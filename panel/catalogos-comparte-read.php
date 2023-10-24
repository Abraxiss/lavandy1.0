<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('menubar.php'); ?>
<link rel="stylesheet" href="stylos/stylos.css">


<div class="container p-3">
<h4> COMPARTE TU CATÁLOGO </h4>
  <div class="row" >
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" class="colm">
     <?php include('comparte.php'); ?> 
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
    <?php include('vistaprevia.php'); ?> 
    </div>

  </div>
</div>






<?php include('./includes/footer.php'); ?>