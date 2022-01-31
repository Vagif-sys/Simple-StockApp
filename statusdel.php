<?php
if($_SESSION['login']==''){
    header('location:auth.php');
} 
require 'db.php';
$sql = 'UPDATE admin_user SET status=1   WHERE id=:id ';
$id = $_GET['id'];
$statement = $pdo->prepare($sql);
$statement -> execute(['id'=> $id]);
if ($statement) {
    echo "<h1>User doesnt have admin rights</h1>";
    
}
?>

<a href='dashboard.php'>Go To Dashboard</a>
