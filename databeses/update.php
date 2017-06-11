<?php
  require_once'config.php';
  $result = false;
  if (!empty($_POST)) {
    extract($_POST);
    $sql = "UPDATE users SET name=:name, email=:email WHERE id=:id";
    $query = $pdo->prepare($sql);
    $result = $query->execute([
      'name' => $name,
      'email' => $email,
      'id' => $id
    ]);
    $nameValue = $name;
    $emailValue = $email;
    $idValue = $id;
  }
  elseif (!empty($_GET)) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute([
      'id' => $id
    ]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $nameValue = $row['name'];
    $emailValue = $row['email'];
    $idValue = $row['id'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Base de datos</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="./update.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li>
            <a href="add.php">Add</a>
          </li>
          <li>
            <a href="list.php">Listar</a>
          </li>
          <li class="active">
            <a href="update.php?id=<?php echo  $id ?>">Update</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <section class="container">
    <?php if ($result): ?>
      <div class="alert alert-success">Actualizado con exito!</div>
    <?php endif ?>
    <form action="" method="POST" autocomplete="off">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $nameValue; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $emailValue; ?>">
      </div>
      <input type="hidden" name="id" value="<?php echo $idValue; ?>">
      <button type="submit" class="btn btn-default">Actualizar</button>
    </form>
  </section>
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>