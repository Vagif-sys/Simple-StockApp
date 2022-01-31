<?php 
   
    if($_SESSION['login']==''){
        header('location:auth.php');
    }   
session_start();
require 'db.php';
error_reporting(E_ALL);
$id = $_GET['id'];
$sql = 'SELECT * FROM products WHERE id=?';
$statement = $pdo->prepare($sql);
$statement->execute([ $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['quantity']) 
    && isset($_POST['price']) && isset($_POST['cost'])) {

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $cost = $_POST['cost'];
    $sql = 'UPDATE products SET name=?, quantity=?,price=?,cost_price=?  WHERE id=?';
    $statement = $pdo->prepare($sql);
    if ($statement->execute([$name, $quantity, $price, $cost, $id])) {
      header("Location: index.php");
    }
}


 ?>

<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Product</h2>
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
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" value="<?= $person->quantity; ?>" name="quantity" id="quantity" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" value="<?= $person->price; ?>" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
          <label for="cost">Cost Price</label>
          <input type="number" value="<?= $person->cost_price; ?>" name="cost" id="cost" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
