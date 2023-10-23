<?php 
if (isset($_GET['cl'])) {
	@session_start();
    $clup=$_SESSION['cl'];
    echo'<script type="text/javascript">
    window.location.href="./../home.php";
    </script>';
exit();
	

} else {

  @session_destroy();
echo'<script type="text/javascript">
    window.location.href="./../index.html";
    </script>';
  exit();
  die();
}
?>
