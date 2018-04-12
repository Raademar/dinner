<?php
  require_once '../core/init.php';
  include 'includes/head.php';
  include 'includes/navigation.php';
  //get happenings from database
  $sql = "SELECT * FROM happening ORDER BY date desc";
  $results = $db->query($sql);

  ?>
  <h2 class="text-center">Happenings</h2>
  <table class="table table-bordered table-striped table-auto">
    <thead>
      <th>Happenings</th><th></th>
    </thead>
    <tbody>
      <?php while($happening = mysqli_fetch_assoc($results)): ?>
        <tr>
          <td><?=$happening['title'];?></td>
          <td>
            <a href="happening.php?edit=<?=$happening['id'];?>" class="btn btn-sm btn-light"><span class="far fa-edit"></span></a>
            <a href="happening.php?delete=<?=$happening['id'];?>" class="btn btn-sm btn-light"><span class="far fa-trash-alt"></span></a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php  include 'includes/footer.php'; ?>
