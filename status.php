<?php

   
if($_SESSION['login']==''){
    header('location:auth.php');
}   

require 'db.php';

$sql = 'UPDATE admin_user SET status=10   WHERE id=:id ';
$id = $_GET['id'];
$query = $pdo->prepare($sql);
$query -> execute(['id'=> $id]);
if($query){

    echo '<h1>You changed User Status<h1>';
   
}

?>

<a href='dashboard.php'>Go To Dashboard</a>




   

