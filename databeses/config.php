<?php
  $dbHost = 'localhost';
  $dbName = 'cursophp';
  $dbUser = 'root';
  $dbPass = '123';
  try {
    $pdo = new PDO("mysql:host=$dbHost; dbname=$dbName", "$dbUser", "$dbPass");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  } catch (Exception $e) {
    echo $e->getMessage();
  }
