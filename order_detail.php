<?php
include 'db_connect.php';
require("backendheader.php");

$id = $_GET['id'];

$sql = "SELECT users.*, orders.voucherno, orders.orderdate, orders.total,orders.note FROM users INNER JOIN orders ON users.id=orders.user_id WHERE orders.id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<!-- Page Heading -->
<h1 class="ml-3"><i class="fas fa-clipboard-list 5x pr-3"></i>Order Detail</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <div class="col-md-10">
        <h4 class="m-0 font-weight-bold text-danger"><?php $row['id'] ?><?php echo $row['voucherno'] ?></h4>
      </div>
      
    </div>
  </div>
 
  <div class="card-body">
    <div class="table">
      <div class="row bg-secondary">
            <div class="offset-md-5 col-md-2">
              <h3 class="text-white">Inovie</h3>
            </div>
          </div>
        
          <div class="container-fluid">
            <div class="row my-5">
              <div class="col-md-4">
              <p>Zay Ben Restaurant</p>
              <p>No.330,Ahlone Road, Dagon Township, Yangon</p>
              <p>Internatonal Hotel Compound</p>
              <p>Phone:(+95)252-221-114</p>
              </div>
              <div class="col-md-8">
                <img src="images/zayben.png" width="200px" height="200px"><h1 class="d-inline">Zay Ben Restaurant</h1>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div class="row my-5">
              <div class="col-md-4">
                <p>Name: <?php echo $row['name'] ?></p>   
                <p>Phone:  <?php echo $row['phone'] ?></p>
                <p>Address:  <?php echo $row['address'] ?></p>
              </div>
              <div class="col-md-8 ">
                <table class="table table-bordered" width="50%">
                  <tbody>
                    <tr>
                      <td>invoice</td>
                      <td><?php echo $row['voucherno'] ?></td>
                    </tr>
                    <tr>
                      <td>Date</td>
                      <td><?php echo $row['orderdate'] ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Price</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                     $id = $_GET['id'];
                      $menu_sql = "SELECT items.*, orderdetails.qty FROM items INNER JOIN orderdetails ON items.id=orderdetails.item_id WHERE orderdetails.voucherno={$row['voucherno']}";
                      $stmt = $pdo->prepare($menu_sql);
                      //$stmt->bindParam(':id',$id);
                      $stmt->execute();
                      $rows = $stmt->fetchAll();
                      $i = 1;
                      $subtotal=0;
                      foreach($rows as $menu)
                      {
                        $id = $menu['id'];
                        $name= $menu['name'];
                        $price= $menu['price'];
                        $qty= $menu['qty'];
                        $total = $qty * $price;
                        $subtotal +=$total;
                        $totalamount=$subtotal+25;
                        //$note= $order['note'];
                        //$status= $order['status'];
                      // $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                      ?>
                  <tr>

                    <td><?php echo $i++ ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $qty ?></td>
                    <td><?php echo $total ?></td>
                  
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="2" rowspan="3">NOTES: <?php echo $row['note'] ?></td>
                    <td colspan="2">Subtotal</td>
                    <td><?php echo $subtotal ?></td>
                  </tr>
                  <tr>
                    <td colspan="2">Tax</td>
                    <td>5%</td>
                  </tr>
                  <tr class="text-danger font-weight-bold">
                    <td colspan="2" >Total Amount</td>
                    <td><?php echo $totalamount ?></td>
                  </tr>
                </tbody>
              </table>
            </div> 
          </div>  
    </div>
  </div>
</div>

<?php
require("backendfooter.php");
?>