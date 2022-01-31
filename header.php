<!doctype html>
<html lang="en">
  <head>
    <title>StockApp</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">StockApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li> 
    </ul>
    <?
   
       if(!isset($_SESSION['login'])): 
    
    ?>
    <a class="btn btn-outline-primary mr-4 mb-2  " href="auth.php">Sign in</a>
    <a class="btn btn-outline-primary mb-2" href="reg.php">Sign up</a>
    <?
      elseif( $_SESSION['auth'] == true and $_SESSION['status'] == 10):
    ?>
    <div><h4 class="p-4 text-dark mr-md-3" >Hi,<?=$_SESSION['login']?></h4></div>
     <div  class="btn btn-outline-primary mb-2 mr-2"><a href='dashboard.php'>Dashboard</a></div>
    <a href='logout.php'>Log out</a>
  </div>
  <?php
   else:     
  ?>
  <div><h4 class="p-4 text-dark mr-md-3" >Hi,<?=$_SESSION['login']?></h4></div>
    <a href='logout.php'>Log out</a>
  <?php endif;?>
</nav>



   
