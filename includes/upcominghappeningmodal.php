<?php
require_once '../core/init.php';
if(isset($_POST["id"])){
  $id = $_POST["id"];
}else{
  $id = NULL;
}
$id = (int)$id;
$sql = "SELECT * FROM happening WHERE id = '$id'";
$result = $db->query($sql);
$happeningmodal = mysqli_fetch_assoc($result);

$author_id = $happeningmodal['author'];
$sql2 = "SELECT full_name FROM user_profile WHERE id ='$author_id'";
$author_query = $db->query($sql2);
$author = mysqli_fetch_assoc($author_query);

?>

<?php ob_start(); ?>
<div class="modal fade" id="upcoming-happening" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"><?= $happeningmodal['title'];?></h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h5><?= $happeningmodal['preview_text'];?></h5>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12 text-center">
          <div class="alert alert-light" role="alert">
            <button type="button" class="btn btn-outline-success">Accept Invite</button>
            <button type="button" class="btn btn-outline-danger">Decline Invite</button>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <p><?= $happeningmodal['text'];?></p>
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
<?php echo ob_get_clean(); ?>
