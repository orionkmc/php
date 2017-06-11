<?php 
  require_once'config.php';
  if (!empty($_GET)) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $result = $query->execute([
      'id' => $id
    ]);
    header("Location:list.php");
  }