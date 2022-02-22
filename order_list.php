<?php
include 'db_connect.php';
require("backendheader.php");

?>
<!-- Page Heading -->
<h1 class="ml-3"><i class="fas fa-concierge-bell 5x pr-3"></i>Order</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-10">
    		<h4 class="m-0 font-weight-bold text-danger">Order Lists</h4>
    	</div>
    </div>
	</div>
 
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Voucher No</th>
            <th>Date</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          
        </tfoot>
        <tbody>
          <?php
          $orderdate= date('Y-m-d');
          $sql = "SELECT * FROM orders WHERE $orderdate";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          $i = 1;
          foreach($rows as $order)
          {
            $id = $order['id'];
            $voucherno= $order['voucherno'];
            $orderdate= $order['orderdate'];
            $total= $order['total'];
            //$note= $order['note'];
            $status= $order['status'];

          
          ?>
          <tr>
            <td><?php echo $i++ ?></td>
            <td><a href="order_detail.php?id=<?php echo $id?>"><?php echo $voucherno ?></a></td>
            <td><?php echo $orderdate ?></td>
            <td><?php echo $total ?></td>
            <!-- <td><img src="<?php echo $photo ?>" width="90px" height="80px"></td> -->
            <td class="text-danger"><?php echo $status ?></td>
            <td><a href="order_confirm.php?id=<?php echo $id?>" class="btn btn-success"><i class="fas fa-check-double"></i> Confirm</a>

               <a href="delivery.php?id=<?php echo $id?>" class="btn btn-info btnedit"><i class="fas fa-truck"></i> Delivery</a>

              	
          		</td>
              
            
          </tr>
          <?php } ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
require("backendfooter.php");
?>