<?php include 'db.php'; ?>

<?php include 'includes/header.php'; ?>

?>
<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      
      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div><br>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div><br>
          <div class="d-grid gap-2 ">
          <input type="submit" name="save_task" class="btn btn-primary" value="Save Task">
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = 'SELECT * FROM task'; //display data CURD
          $result_tasks = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['create_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row[
                  'id'
              ]; ?>" class="btn btn-success">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row[
                  'id'
              ]; ?>" class="btn btn-warning">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
