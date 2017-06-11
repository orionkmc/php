<?php
  require_once'config.php';
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
        <?php foreach ($blog_posts as $blog_post): ?>
          <div class="blog-post">
            <h2><?= $blog_post['title'] ?></h2>
            <p>Jan 1, 2020 by <a href="">Alex</a></p>
            <div class="blog-post-image">
              <img src="assets/img/Modulos.jpg" alt="">
            </div>
            <div class="blog-post-conten"><?= $blog_post['content'] ?></div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="col-md-4">
        container
      </div>
    </div>
    <div class="row">
      <footer>
        This is a footer
        <a href="admin/index.php">Admin Panel</a>
      </footer>
    </div>
  </div>
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>