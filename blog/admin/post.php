<?php
  $sql = "SELECT * FROM blog_posts ORDER BY id DESC";
  $query = $pdo->prepare($sql);
  $query->execute();
  $blog_posts = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blog</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <row>
      <div class="col-md-12">
        <h1>Blog</h1>
      </div>
    </row>
    <div class="row">
      <div class="col-md-8">
        <h2>Post</h2>
        <a href="insert-post.php" class="btn btn-primary">New Post</a>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Title</th>
              <th>Content</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Title</th>
              <th>Content</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($blog_posts as $blog_post): ?>
              <tr>
                <td><?= $blog_post['title'] ?></td>
                <td><?= $blog_post['content'] ?></td>
                <td>
                  <a href="update.php?id=<?= $blog_post['id'] ?>" class="btn btn-default" aria-label="Left Align">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                  </a>
                </td>
                <td>
                  <a href="delete.php?id=<?= $blog_post['id'] ?>" class="btn btn-default" aria-label="Left Align">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, debitis recusandae minima dolores sapiente eligendi. Fugit enim nobis eveniet placeat, aspernatur, maiores ex explicabo voluptas officia a. Eius, nam, porro.
      </div>
    </div>
    <div class="row">
      <footer>
        This is a footer
        <a href="admin/index.php">Panel Admin</a>
      </footer>
    </div>
  </div>
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>