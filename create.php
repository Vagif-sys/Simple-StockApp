<?php


if(!$_SESSION['login']){
  header('location:auth.php');
}


require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['quantity']) 
      && isset($_POST['price']) && isset($_POST['cost'])) {
        
  $name = $_POST['name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $cost = $_POST['cost'];
  $sql = 'INSERT INTO products(name, quantity,price,cost_price,data) VALUES(?, ?,?,?,?)';
  
  $statement = $pdo->prepare($sql);
  if ($statement->execute([ $name, $quantity, $price, $cost,time()])) {
    $message = 'data inserted successfully';
    header("Location: index.php");
  }



}


 ?>
<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add Your Product</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Quantity</label>
          <input type="number" name="quantity" id="quantity" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
          <label for="cost price">Cost Price</label>
          <input type="number" name="cost" id="cost" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
