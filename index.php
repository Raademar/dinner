<?php
  require_once 'core/init.php';
  include 'includes/head.php';
  include 'includes/header.php';
  include 'includes/leftbar.php';

  $sql = "SELECT * FROM happening WHERE date > CURRENT_DATE";
  $happening = $db->query($sql);

  $sql2 = "SELECT * FROM happening WHERE date < CURRENT_DATE";
  $recenthappening = $db->query($sql2);
 ?>

        <div class="row justify-content-center">
          <div class="col-md-8 col-sm-8 col-xs-8 center-col-spacing">
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
          <?php while($recentevent = mysqli_fetch_assoc($recenthappening)) : ?>
            <div class="row justify-content-center">
              <div class="col-sm-5 center-col-spacing">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Recent Happening</h5>
                    <p class="card-text">Visit the events of your last dinners and rate the restaurants now!</p>
                    <button type="button" class="btn btn-info" onclick="recenthappeningmodal(<?=$recentevent['id']; ?>)">Visit Happening</button>
                  </div>
                </div>
              </div>
             </div>
           <?php endwhile; ?>
           <div class="row justify-content-center">
            <div class="col-md-10 center-col-spacing">
              <div class="card-deck">
                <div class="card">
                  <img class="card-img-top" src="images/pexels-photo-708587.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">DinnerMatch Recommendations</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/pexels-photo-262896.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">DinnerMatch Recommendations</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/pexels-photo-428355.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">DinnerMatch Recommendations</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php

  include 'includes/rightbar.php';
  include 'includes/footer.php';
 ?>
