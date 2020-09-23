<?php  $path = 'img/slider/';
$scan = scandir($path, SCANDIR_SORT_DESCENDING,);
?>

<?php include('inc/header.php'); ?>

<div class="container-lg-fluid">
<?php for($i=0; $i <= count($scan)-3; $i++):?>
<div class="card card-body w-50 float-lg-left mt-2">
  <img src="<?php echo $path . $scan[$i]?>" class="card-img rounded ">
</div>
<?php endfor; ?>
</div>
 <?php include('./inc/footer.php'); ?>