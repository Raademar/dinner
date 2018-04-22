<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/dinner/core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';

  $sql = "SELECT * FROM happening WHERE date >= CURRENT_DATE order by date";
  $happening = $db->query($sql);


  ?>
  <h1 class="text-center display-1">Keisa Kelly</h1><hr>

  <div class="row">
    <div class="col-md-3 center-col-spacing">
      <img src="../images/profilepic.jpeg" class="rounded img-fluid" alt="profile picture">
      <h3 class="display-4 left-profile-spacing">They see me rollin..</h3>
      <ul class="list-group list-group-flush left-profile-spacing">
        <li class="list-group-item profile-link-hover"><a href="#">Upcoming Happenings</a><span class="badge badge-pill badge-primary float-right">2</span></li>
        <li class="list-group-item profile-link-hover"><a href="#">Recent Happenings</a><span class="badge badge-pill badge-primary float-right">5</span></li>
        <li class="list-group-item profile-link-hover"><a href="#">Best friends</a><span class="badge badge-pill badge-primary float-right">2</span></li>
        <li class="list-group-item profile-link-hover"><a href="#">Favorites</a><span class="badge badge-pill badge-primary float-right">1</span></li>
        <li class="list-group-item profile-link-hover"><a href="#">Settings</a></li>
      </ul>

    </div>
    <div class="col-md-6">
      <?php while($event = mysqli_fetch_assoc($happening)) : ?>
        <div class="col-md-12 center-col-spacing">
          <div class="card text-center">
            <div class="card-header">Upcoming Happening!</div>
              <div class="card-body">
                <h5 class="card-title"><?= $event['title'];?></h5>
                <p class="card-text"><?= $event['preview_text'];?></p>
                <button type="button" class="btn btn-info" onclick="upcominghappeningmodal(<?=$event['id']; ?>)">Visit Happening</button>
              </div>
              <div class="card-footer text-muted"><?= $event['date'];?></div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>




    <div class="col-md-3 center-col-spacing" >
      <div class="card">
        <div id="target" class="hiddenDragdrop" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">drop zone </div>
        <div class="card-header small-card-header text-center" id="draggable-content headingOne" draggable="true" ondragstart="dragstart_handler(event);"
         data-toggle="collapse" data-target="#collapseOne" role="button" aria-controls="collapseOne" aria-expanded="true">
          Images
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <div class="thumbnail-grid">
              <img src="../images/bowl.jpeg" alt="example" class="img-thumbnail image-hover-overlay">
              <img src="../images/banken.jpeg" alt="example" class="img-thumbnail image-hover-overlay">
              <img src="../images/sushi.jpeg" alt="example" class="img-thumbnail image-hover-overlay">
              <img src="../images/vandring.jpeg" alt="example" class="img-thumbnail image-hover-overlay">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div id="target" class="hiddenDragdrop" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">drop zone </div>
        <div class="card-header small-card-header text-center" id="draggable-content headingTwo" draggable="true" ondragstart="dragstart_handler(event);"
         data-toggle="collapse" data-target="#collapseTwo" role="button" aria-controls="collapseTwo" aria-expanded="false">
          Images Two
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <div>
              <ul>
                <li>This is my first li</li>
                <li>Another one</li>
                <li>Next one</li>
                <li>Last one</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </div>




  <?php include 'includes/footer.php' ?>
