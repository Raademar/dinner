<?php
require_once '../core/init.php';
if(isset($_POST["id"])){
  $id = $_POST["id"];
}else{
  $id = NULL;
}

$id = (int)$id;
$sql3 ="SELECT * FROM happening WHERE id = '$id'";
$date_query = $db->query($sql3);
$outofdate = mysqli_fetch_assoc($date_query);

?>
<?php ob_start(); ?>
<div class="modal fade" id="recent-happening" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"><?= $outofdate['title'];?></h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h5><?= $outofdate['preview_text'];?></h5>
        </div>
      </div>
      <div class="row justify-content-center center-col-spacing">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <p><?= $outofdat['text'];?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center center-col-spacing">
        <div class="col-md-6 text-center text-muted">
          <p>Happening created by <?= $author['full_name']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php ob_get_clean(); ?>
