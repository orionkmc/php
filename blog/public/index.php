<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once'../config.php';

(isset($_GET['route'])) ? $route  = $_GET['route'] : $route = '/';
switch ($route) {
  case '/':
    require'../index.php';
    break;

  case 'admin':
    require'../admin/index.php';
    break;

  case 'admin/post':
    require'../admin/post.php';
    break;
  
  default:
    
    break;
}