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
          <h5><?= $happeningmodal['preview_text'];?></h5><hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <img src="<?=$happeningmodal['image']; ?>" class="img-fluid" alt="<?=$happeningmodal['title']; ?>">
        </div>
      </div>
      <div class="row" id="invite-row">
        <div class="col-md-7 text-center">
          <div class="alert alert-light" role="alert">
            <button type="button" id="accept-invite" class="btn btn-outline-success btn-sm">Accept Invite</button>
            <button type="button" id="decline-invite" class="btn btn-outline-danger btn-sm">Decline Invite</button>
          </div>
        </div>
        <div class="col-md-5">
          <div class="alert alert-light" role="alert">
            <button class="btn btn-outline-info btn-sm" type="button" data-toggle="collapse" data-target="#attending-collapse" aria-expanded="false" aria-controls="attending-collapse">
              See who's attending
            </button>
            <div class="collapse" id="attending-collapse">
              <div class="card card-body">
                <?= $happeningmodal['users_attending']; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-body">
              <p><?= $happeningmodal['text'];?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>Google Map Position Goes Here</p>
        </div>
      </div>
      <div class="modal-footer">
        <span class="fas fa-times light-dark" onclick="closeModal()"></span>
      </div>
    </div>
  </div>
</div>
<script>
  function closeModal (){
    $('#upcoming-happening').modal('hide');
    setTimeout(function(){
      jQuery('#upcoming-happening').remove();
      jQuer('.modal-backdrop').remove();
    },500);
  }
</script>

<?php echo ob_get_clean(); ?>
