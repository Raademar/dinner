<?php
  require_once '../core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';
  //get happenings from database
  $sql = "SELECT * FROM happening "; //WHERE date >= CURRENT_DATE ORDER BY id
  $results = $db->query($sql);
  $errors = array();
  //If add form is submitted
  if(isset($_POST['add_submit'])){
    $happening = $_POST['happening'];
    //check if happening is blank
    if($_POST['happening'] == ''){
      $errors[].= 'You must input a Happening.';
    }
    // check if happening exists in database
    $sql = "SELECT * FROM happening WHERE title ='$happening'";
    $result = $db->query($sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
      $errors[] .= $happening.' already exsist. Please choose another name';
    }

    // display errors
    if(!empty($errors)){
      echo display_errors($errors);
    }else {
      //Add happening to database
      $sql2 = "INSERT INTO happening (title) VALUES ('$happening')";
      $db->query($sql2);
      header('Location: happening.php');
    }

  }

  ?>
  <h2 class="text-center">Upcoming Happenings</h2><hr>
  <!-- Happenings form -->
  <div class="d-flex justify-content-center">
    <form class="form-inline" action="happening.php" method="post">
      <div class="form-group">
        <label for="happening">Add a Happening:</label>
        <input type="text" name="happening" id="happening" class="form-control" value="<?=((isset($_POST['happening']))?$_POST['happening']:''); ?>">
        <input type="submit" name="add_submit" value="Add Happening" class="btn btn-outline-success">
      </div>
    </form>
  </div><hr>

  <table class="table table-bordered table-striped table-auto">
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
<?php  include 'includes/footer.php'; ?>
