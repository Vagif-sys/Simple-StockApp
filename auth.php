<?php

session_start();
require('db.php');
$error='';
//session_start();
if(isset($_POST['login']) && $_POST['pass']){

	$login=$_POST['login'];
	$pass=$_POST['pass'];

	$sql="SELECT * FROM admin_user WHERE login=? and password=?";
	$query=$pdo->prepare($sql);
	$query->execute([$login,$pass]);
  $checkuser = $query->rowCount();
  $user = $query->fetch(PDO::FETCH_ASSOC);
	if($checkuser > 0){
    $_SESSION['auth'] = true; 
    $_SESSION['id'] = $user['id']; 
    $_SESSION['login'] = $user['login']; 

    $_SESSION['status'] = $user['status']; 

    if ( $_SESSION['auth'] == true and $_SESSION['status'] == 10) {

         header('location:dashboard.php');
         
    } elseif(( $_SESSION['auth'] == true and $_SESSION['status'] == 1)) {

         header('location:index.php');
    }
  } 
  
  }
      
  
  

?>


<?php require 'header.php'; ?>
<?php 
        
    if(!isset($_SESSION['login'])):     
?>
<main class='container mt-5'>
    <div class='row'>
      <div class='col-md-8 mb-3'>
          <h4>Sign in Form</h4>
          <form action='' method='POST'>
            <label for='login'>Your Login: </label>
            <input type='text' name='login' id='login' class='form-control'>

            <label for='pass'>Your Password: </label>
            <input type='password' name='pass' id='pass' class='form-control'>
            <!-- <div class='alert alert-danger mt-3' id='error'></div> -->
            <button type='submit'  class='btn btn-success mt-5'>Sign Up</button>
          </form>
          <?php
            else :     
          ?>
              
           <?php
              endif;
           ?>
      </div>
    </div>

</main>

<?php require 'footer.php'; ?>