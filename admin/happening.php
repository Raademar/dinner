<?php
  require_once '../core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';
  //get happenings from database
  $sql = "SELECT * FROM happening  WHERE date >= CURRENT_DATE ORDER BY date";
  $results = $db->query($sql);
  $errors = array();


  //If add form is submitted
  if(isset($_POST['add_submit'])){
    $addhappening = sanitize($_POST['addhappening']);
    $happeningtext = $_POST['happeningtext'];
    $happeningdate = $_POST['happeningdate'];
    $happeninguserid = $_POST['userid'];
    $happeningimage = $_POST['imageuploader'];

    $previewtext = substr($happeningtext, 0, 30).'...';

    //check if happening is blank
    if($_POST['addhappening'] == ''){
      $errors[] .= 'You must input a Title.';
    }
    if($_POST['happeningtext'] == ''){
      $errors[] .= 'You must input a description.';
    }
    if($_POST['happeningdate'] == ''){
      $errors[] .= 'You must choose a date.';
    }
    if($_POST['userid'] == ''){
      $errors[] .= 'You must insert your user ID.';
    }
    if($_POST['imageuploader'] == ''){
      $errors[] .= 'You must upload an image.';
    }
    // check if happening exists in database
    $sql = "SELECT * FROM happening WHERE title ='$addhappening'";
    $result = $db->query($sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
      $errors[] = $addhappening.' already exsist. Please choose another name';
    }

    // display errors
    if(!empty($errors)){
      echo display_errors($errors);
    }else {
      //Add happening to database
      $sql = "INSERT INTO happening (title, preview_text, text, date, author, users_attending, image)
      VALUES ('$addhappening', '$previewtext', '$happeningtext', '$happeningdate', '$happeninguserid', 'Some People', 'images/$happeningimage')";
      $db->query($sql);
      header('Location: happening.php');
    }

  }

  ?>
  <h2 class="text-center">Upcoming Happenings</h2><hr>
  <!-- Happenings form -->
  <div class="row">
    <div class="col-md-8">
      <table class="table table-bordered table-striped table-auto table-sm">
        <thead>
          <th>Upcoming Happenings</th><th>Date</th>
        </thead>
        <tbody>
          <?php while($happening = mysqli_fetch_assoc($results)): ?>
            <tr>
              <td><?=$happening['title'];?></td>
              <td><?=$happening['date'];?></td>
              <td>
                <a href="happening.php?edit=<?=$happening['id'];?>" class="btn btn-sm btn-light"><span class="far fa-edit"></span></a>
                <a href="happening.php?delete=<?=$happening['id'];?>" class="btn btn-sm btn-light"><span class="far fa-trash-alt"></span></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      <form action="happening.php" method="post">
        <div class="form-group">
          <label for="happening">Title</label>
          <input type="text" name="addhappening" id="addhappening" class="form-control" value="<?=((isset($_POST['addhappening']))?$_POST['addhappening']:''); ?>">
        </div>
          <div class="form-group">
            <label for="happeningText">Say something about your Happening..</label>
            <textarea class="form-control" name="happeningtext" id="happeningtext" type="text" rows="3" value="<?=((isset($_POST['happeningtext']))?$_POST['happeningtext']:''); ?>"></textarea>
          </div>
          <div class="form-group">
            <label for="pickFriends">Invite your friends..</label>
            <select class="custom-select" multiple id="pickFriends" size="3">
              <option value="1">Karl Klarksson</option>
              <option value="2">Jenni Ferguson</option>
              <option value="3">Stewie Wonder</option>
              <option value="4">Mustafa Karim</option>
              <option value="5">Malin Svensson</option>
              <option value="6">Hanna Blue</option>
              <option value="7">Derrick Johnsson</option>
            </select>
          </div>
          <div class="form-group">
            <label for="happeningdate">Pick a date for your Happening..</label><br>
            <input id="happeningdate" name="happeningdate" type="date">
          </div>
          <div class="form-group">
            <label for="imageuploader">Pick a picture for your Happening..</label>
            <input type="file" class="form-control-file" name="imageuploader" id="imageuploader">
          </div>
          <div class="form-group">
            <label for="userid">User ID..</label><br>
            <input class="form-control" type="text" name="userid" id="userid" value="<?=((isset($_POST['userid']))?$_POST['userid']:''); ?>">
          </div>
          <!-- <div class="form-check">
            <input class="form-check-input" type="radio" name="publicHappening" id="publicHappening1" value="public" checked>
            <label class="form-check-label" for="publicHappening1">Public</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="privateHappening" id="privateHappening1" value="private">
            <label class="form-check-label" for="privateHappening1">Private</label>
          </div>  -->
        <input type="submit" name="add_submit" value="Add Happening" class="btn btn-outline-success">
      </form>
    </div>
  </div><hr>
<?php  include 'includes/footer.php'; ?>
