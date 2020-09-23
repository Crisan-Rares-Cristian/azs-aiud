<?php  $path = 'img/slider/';
$scan = scandir($path, SCANDIR_SORT_DESCENDING,);
?>

<?php include('inc/header.php'); ?>

<div class="container">
  <div class="row">
    <?php for($i=0; $i <= count($scan)-3; $i++):?>
    <?php if(($i % 2) === 0):?>
      <div class="card card-body w-100 col-3  float-lg-left m-2">
      <a href="<?php echo $path . $scan[$i]?>"><img src="<?php echo $path . $scan[$i]?>" class="card-img rounded "></a>
      </div>
    <?php else:?>
    <div class="card card-body w-100 col-4 float-lg-left m-2">
      <a href="<?php echo $path . $scan[$i]?>"><img src="<?php echo $path . $scan[$i]?>" class="card-img rounded "></a>
    </div>
    <?php endif; ?>
    <?php endfor; ?>
  </div> 
<!-- end row -->
</div>
 <?php include('./inc/footer.php'); ?>