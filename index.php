<?php
session_start();
require 'db.php';
$sql = 'SELECT * FROM products';
$statement = $pdo->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Products</h2>
    </div>
    
    <div class="card-body">
    
      <table class="table table-bordered">
        <tr>
          
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Cost Price</th>
          <th>Date</th>
          <th>Your Profit</th>
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
            <?php 
                for($i=0; $i<count($person);$i++) {
                $subtotal = $person->quantity * $person->price + $person->cost_price;
                
              }
    
            ?>
            <td><?= $subtotal;?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
   
  </div>
</div>
<?php require 'footer.php'; ?>
