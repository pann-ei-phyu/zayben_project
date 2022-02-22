<?php
include 'db_connect.php';
require("frontendheader.php");

?>
<!-- Page Heading -->
<div class="container-fluid my-5">
  <h1 class="ml-3">Your Order History</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Voucher Number</th>
            <th scope="col">Order Date</th>
            <th scope="col">TotalPrice</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_SESSION['loginuser']['id']))
          {
            $id = $_SESSION['loginuser']['id'];
            $sql = "SELECT orders.*,users.id FROM users INNER JOIN orders ON users.id=orders.user_id WHERE orders.user_id=:id";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(':id',$id);
              $stmt->execute();
              $rows = $stmt->fetchAll();
              $i = 1;
              foreach($rows as $order)
              {
                $voucherno= $order['voucherno'];
                $orderdate= $order['orderdate'];
                $total= $order['total'];

              
              ?>
              <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $voucherno ?></a></td>
                <td><?php echo $orderdate ?></td>
                <td><?php echo $total ?></td>
                  
                
              </tr>
          
          
          <?php } 

        }?>
          
        </tbody>
      </table>
</div>

<?php
require("frontendfooter.php");
?>