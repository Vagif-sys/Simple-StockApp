<?php 
  /*
    require 'db.php';
    if(isset($_POST['login']) 
       && isset($_POST['pass']) && isset($_POST['confpass'])){

        $login = $_POST['login'];
        
        $pass = $_POST['pass'];
        $cpass = $_POST['confpass'];
  
        $pass = md5($pass);
        if($pass = $cpass){
           $sql = "INSERT INTO admin_user(login,password) VALUES(?,?)";
           $query = $pdo->prepare($sql);
           $query->execute([$login,$pass]);
           header("Location: auth.php");
        }else{

           echo 'password mismatched';
        }     
    }

?>
<?php require 'header.php'; ?>
<main class='container mt-5'>
    <div class='row'>
      <div class='col-md-8 mb-3'>
      
          <h4>Sign up Form</h4>
          <form action='' method='POST'>

            <label for='login'>Your Login: </label>
            <input type='text' name='login' id='login' class='form-control'>

            <label for='pass'>Your Password: </label>
            <input type='password' name='pass' id='pass' class='form-control'>

            <label for='pass'>Confirm Password: </label>
            <input type='password' name='confpass' id='confpass' class='form-control'>
            <!-- <div class='alert alert-danger mt-3' id='error'></div> -->
            <button type='submit'  class='btn btn-success mt-5'>Sign Up</button>
          </form>
         
      </div>
    </div>

</main>

<?php require 'footer.php'; ?>

*/