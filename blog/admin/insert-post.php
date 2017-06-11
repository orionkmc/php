<?php
  $result = false;
  if (!empty($_POST)) {
    extract($_POST);
    $sql = "INSERT INTO blog_posts (title, content) VALUE(:title, :content)";
    $query = $pdo->prepare($sql);
    $result = $query->execute([
      'title' => $title, 
      'content' => $content
    ]);
  }
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
        <h2>New Post</h2>
      <?php if ($result): ?>
        <div class="alert alert-success">Guardado con exito!</div>
      <?php endif ?>
        <a href="post.php" class="btn btn-default">Back</a>
        <form action="insert-post.php" method="POST">
          <div class="form-group">
            <label for="tile">Title</label>
            <input type="text" class="form-control" id="tile" name="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="content">Cotent</label>
            <textarea class="form-control" name="content" id="content" name="content"></textarea>
          </div>
          <button type="submit" class="btn btn-default">Save</button>
        </form>
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