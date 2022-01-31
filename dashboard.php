<?php


if(!$_SESSION['login']){
  header('location:auth.php');
}


session_start();
require 'db.php';
error_reporting(E_ALL);
$sql = 'SELECT * FROM products';
$statement = $pdo->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h1>Dashboard</h1>
      <h2>All Products</h2>
      <div class='card-header '>
      <a  href="create.php">Add Product</a>
    </div>
    </div>
    
    <div class="card-body">
    
      <table class="table table-bordered">
        <tr>
          
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Cost Price</th>
          <th>Date</th>
          <th>Action</th>

        </tr>
       
       
        <?php foreach($people as $person): ?>
          <tr>
            
            <td><?= $person->name; ?></td>
            <td><?= $person->quantity; ?></td>
            <td><?= $person->price; ?></td>
            <td><?= $person->cost_price; ?></td>
            <?php
             
             $data=date('d ',$person->data);
             $array=['January',"February",'March',"April",'May','June','Jule','August','September',
                    
                     'Octomber','November','December'];
             $data.=$array[date('n',$person->data)-1];
             $data.=date(' H:i',$person->data);
           
         ?> 
            <td><?= $data; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
            
          </tr>
        <?php endforeach; ?>
      </table>
    </div>     
  </div>
  <?php
    
        require 'db.php';
        $sql = 'SELECT * FROM admin_user';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $user = $statement->fetchAll(PDO::FETCH_OBJ);
  ?>
  <hr>
   <?php 
       
       $sql = "SELECT * FROM admin_user";
       $query=$pdo->query($sql);
   ?>

  <div class="card-body">
    
    <table class="table table-bordered">
      <tr>
        
        <th>Name</th>
        <th>Role</th>
        <th>Status</th>
        <th>Change status</th>
      </tr>
     
     
      <?php while($row = $query->fetch(PDO::FETCH_OBJ)): ?>
        <tr>
          
          <td><?= $row->login; ?></td>
          <td><?= $row->roles; ?></td>
          <td><?= $row->status; ?></td>
          
             <?php
                 $status = $row->status;
                 if($status==1) $strStatus="<a class='btn btn-success'href=status.php?id=".$row->id.">Edit</a>";
                 if($status==10)$strStatus="<a class='btn btn-danger' href=statusdel.php?id=" .$row->id.">Delete</a>";
                    echo "<br><td>.$strStatus.</td>";
                 
              ?>        
          
              
         
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>