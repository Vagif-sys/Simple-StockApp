<?php





session_start();
if(!$_SESSION['user']){
   header('location:auth.php');
}
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM products WHERE id=?';
$statement = $pdo->prepare($sql);
if ($statement->execute([$id])) {
  header("Location: index.php");
}